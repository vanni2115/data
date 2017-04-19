                                    
                                    <?php
                                        include("control/configure.php");
                                        include("simple_html_dom.php");
                                        $str = $_SERVER['HTTP_REFERER'];
                                        // xu ly cat chuoi toan ven
                                        function words($str,$num)
                                        {
                                            $limit = $num - 1 ;
                                            $str_tmp = '';
                                             $str = str_replace(']]>', ']]&gt;', $str);
                                             $str = strip_tags($str);
                                            $arrstr = explode(" ", $str);
                                            if ( count($arrstr) <= $num ) { return $str; }
                                            if (!empty($arrstr))
                                            {
                                                for ( $j=0; $j< count($arrstr) ; $j++)    
                                                {
                                                    $str_tmp .= " " . $arrstr[$j];
                                                    if ($j == $limit) 
                                                    {
                                                        break;
                                                    }
                                                }
                                            }
                                            return $str_tmp."...";
                                        }

                                        if (strpos($str,"topic")==true) {
                                            // của từng topic
                                            if (strpos($str,"topic.php")==true){
                                                $strtopic = substr($str, -1);
                                                $sql = "SELECT * FROM article, topic, user WHERE ((article.iduser=user.iduser) AND (article.idtopic=topic.idtopic) AND (article.state = '1') AND (article.idtopic = '$strtopic') AND (article.iduser = '1'))  ORDER BY datepost DESC";
                                                $result = mysqli_query($con, $sql);
                                                ?>

                                                <div class="row" style="border-bottom: 1px solid #ddd;">
                                                    <div class="col-md-3">
                                                        <div class="dropdown-toggle" data-toggle="dropdown" style="">
                                                            <?php
                                                                $sql2 = "SELECT * FROM topic WHERE ((state='1') AND (idtopic = '$strtopic'))";
                                                                $sql1 = "SELECT * FROM topic WHERE ((state='1') AND (idtopic !='1') AND (idtopic !='2') AND (idtopic !='3') AND (idtopic != '$strtopic'))";
                                                                $result2 = mysqli_query($con, $sql2);
                                                                $result1 = mysqli_query($con, $sql1);
                                                                while($row2=mysqli_fetch_array($result2)){
                                                                ?>
                                                            <h3 class="title" style="background:none;border-bottom:unset;margin-top:10px;"><?php echo $row2['nametopic']; ?> <span class="caret"></span> </h3>
                                                        </div>
                                                        <ul class="dropdown-menu pad1" role="menu">
                                                            <li><a href="topics.php"> Tất cả Chủ đề</a></li>
                                                                <?php
                                                                
                                                                    echo "<li class='active'><a href='topic.php?idtopic={$row2['idtopic']}'><span class='glyphicon glyphicon-stop' style='color:{$row2['color']};'></span> ".$row2['nametopic']."</a></li>";
                                                                }
                                                                while($row1=mysqli_fetch_array($result1)){
                                                                    echo "<li><a href='topic.php?idtopic={$row1['idtopic']}'><span class='glyphicon glyphicon-stop' style='color:{$row1['color']};'></span> ".$row1['nametopic']."</a></li>";
                                                                }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <div class="btn-group col-md-4">
                                                        <div class="btn btn-default">
                                                            <div><a href="#/" style="font-size:16px;color:black;">Mới nhất</a></div>
                                                        </div>
                                                        <div class="btn btn-default">
                                                            <div><a href="#orderview" style="font-size:16px;color:black;">Xem nhiều nhất</a></div>
                                                        </div>
                                                        <div class="btn btn-default active">
                                                            <div><a href="#orderadmin" style="font-size:16px;color:black;">Admin</a></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 visible-lg-block">
                                                        <div class="row">
                                                            <div class="col-md-2">Lượt xem</div>
                                                            <div class="col-md-3">Lượt trả lời</div>
                                                            <div class="col-md-4">Chủ đề</div>
                                                            <div class="col-md-3">Người đăng</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                while($row=mysqli_fetch_array($result)){
                                                    $small = $row['content'];
                                                    $html = str_get_html($small)->plaintext;
                                                    $rutgon = words($html, 30);
                                                    echo "<div class='row' style='border-bottom:dashed 1px #d2d2d2;margin:20px 50px;'>
                                                    <div class='col-md-7'>
                                                        <div id='tieude_tintuc'>
                                                            <a href='article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}'>" .$row['namearticle']. "</a>
                                                        </div>
                                                        <div style='font-size:12px;padding-bottom:10px;'>" .$row['datepost']. "</div>
                                                        <div class='dv-mota-tintuc'>" .$rutgon. "</div>
                                                    </div>
                                                    <div class='col-md-1' style='padding-top:30px;'>
                                                        <a title='Lượt xem'>" .$row['countview']. "</a>
                                                    </div>
                                                    <div class='col-md-1' style='padding-top:30px;'>
                                                        <a title='Lượt trả lời'>" .$row['countcomment']. "</a>
                                                    </div>
                                                    <div class='col-md-2' style='padding-top:30px;'>
                                                        <a href='topic.php?idtopic={$row['idtopic']}' title='Chủ đề' style='color:black;'><span class='glyphicon glyphicon-stop' style='color:{$row['color']};'></span> {$row['nametopic']}</a>
                                                    </div>
                                                    <div class='col-md-1' style='padding-top:15px;'>
                                                        <a href='profile.php?iduser={$row['iduser']}' title='Đăng bởi {$row['fullname']}'><img class='img-circle img-responsive' src='upload/{$row['avatar']}' style='width:50px;height:50px;' alt='/'></a>
                                                    </div>
                                                    <div class='clear'> </div>
                                                </div>";
                                                }
                                            }else{
                                                // tất cả topics
                                                $sql = "SELECT * FROM article, topic, user WHERE ((article.iduser=user.iduser) AND (article.idtopic=topic.idtopic) AND (article.state = '1') AND (article.iduser = '1'))  ORDER BY datepost DESC";
                                                $result = mysqli_query($con, $sql);
                                                ?>

                                                <div class="row" style="border-bottom: 1px solid #ddd;">
                                                    <div class="col-md-3">
                                                        <div class="dropdown-toggle" data-toggle="dropdown" style="">
                                                            <h3 class="title" style="background:none;border-bottom:unset;margin-top:10px;">Tất cả Chủ đề <span class="caret"></span> </h3>
                                                        </div>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="topics.php"> Tất cả Chủ đề</a></li>
                                                            <?php
                                                                // include("control/configure.php");
                                                                $sql1 = "SELECT * FROM topic WHERE ((state='1') AND (idtopic !='1') AND (idtopic !='2') AND (idtopic !='3'))";
                                                                $result1 = mysqli_query($con, $sql1);
                                                                while($row1=mysqli_fetch_array($result1)){
                                                                    echo "<li><a href='topic.php?idtopic={$row1['idtopic']}'><span class='glyphicon glyphicon-stop' style='color:{$row1['color']};'></span> ".$row1['nametopic']."</a></li>";
                                                                }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <div class="btn-group col-md-4">
                                                        <div class="btn btn-default">
                                                            <div><a href="#/" style="font-size:16px;color:black;">Mới nhất</a></div>
                                                        </div>
                                                        <div class="btn btn-default">
                                                            <div><a href="#orderview" style="font-size:16px;color:black;">Xem nhiều nhất</a></div>
                                                        </div>
                                                        <div class="btn btn-default active">
                                                            <div><a href="#orderadmin" style="font-size:16px;color:black;">Admin</a></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 visible-lg-block">
                                                        <div class="row">
                                                            <div class="col-md-2">Lượt xem</div>
                                                            <div class="col-md-3">Lượt trả lời</div>
                                                            <div class="col-md-4">Chủ đề</div>
                                                            <div class="col-md-3">Người đăng</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                while($row=mysqli_fetch_array($result)){
                                                    $small = $row['content'];
                                                    $html = str_get_html($small)->plaintext;
                                                    $rutgon = words($html, 30);
                                                    echo "<div class='row' style='border-bottom:dashed 1px #d2d2d2;margin:30px 0;'>
                                                    <div class='col-md-7'>
                                                        <div id='tieude_tintuc'>
                                                            <a href='article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}'>" .$row['namearticle']. "</a>
                                                        </div>
                                                        <div style='font-size:12px;padding-bottom:10px;'>" .$row['datepost']. "</div>
                                                        <div class='dv-mota-tintuc'>" .$rutgon. "</div>
                                                    </div>
                                                    <div class='col-md-1' style='padding-top:30px;'>
                                                        <a title='Lượt xem'>" .$row['countview']. "</a>
                                                    </div>
                                                    <div class='col-md-1' style='padding-top:30px;'>
                                                        <a title='Lượt trả lời'>" .$row['countcomment']. "</a>
                                                    </div>
                                                    <div class='col-md-2' style='padding-top:30px;'>
                                                        <a href='topic.php?idtopic={$row['idtopic']}' title='Chủ đề' style='color:black;'><span class='glyphicon glyphicon-stop' style='color:{$row['color']};'></span> {$row['nametopic']}</a>
                                                    </div>
                                                    <div class='col-md-1' style='padding-top:15px;'>
                                                        <a href='profile.php?iduser={$row['iduser']}' title='Đăng bởi {$row['fullname']}'><img class='img-circle img-responsive' src='upload/{$row['avatar']}' style='width:50px;height:50px;' alt='/'></a>
                                                    </div>
                                                    <div class='clear'> </div>
                                                </div>";
                                                }
                                            }

                                        }else{
                                            if (strpos($str,"search.php")==true){
                                                $dai1=strlen($str);
                                                $dai2=strlen("&btnTim=btnTim");
                                                $kitu = strpos($str,"=");
                                                $strstart=substr($str,0, $kitu+1);
                                                $dai3=strlen($strstart);
                                                $dodai=$dai1-$dai2-$dai3;
                                                // lay ra tu ma nguoi dung tim kiem
                                                $strsearch = substr($str, 46, $dodai);
                                                // decode url
                                                $x = urldecode($strsearch);
                                                    $search = $strsearch;
                                                    $sql = "SELECT * FROM article, user, topic WHERE ((article.iduser=user.iduser) AND (article.idtopic=topic.idtopic) AND (article.state = '1') AND (article.iduser = '1') AND ((namearticle LIKE '%$x%') OR (fullname LIKE '%$x%') OR (article.content LIKE '%$x%'))) ORDER BY datepost DESC";
                                                    $result = mysqli_query($con, $sql);
                                                
                                                    ?>

                                                    <div class="row">
                                                        <div class="btn-group col-md-4 col-md-offset-2 col-xs-push-1">
                                                            <div class="btn btn-default">
                                                                <div><a href="#/" style="font-size:16px;color:black;">Mới nhất</a></div>
                                                            </div>
                                                            <div class="btn btn-default">
                                                                <div><a href="#orderview" style="font-size:16px;color:black;">Xem nhiều nhất</a></div>
                                                            </div>
                                                            <div class="btn btn-default active">
                                                                <div><a href="#orderadmin" style="font-size:16px;color:black;">Admin</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 col-md-offset-1 visible-lg-block">
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin-left:-30px;">Lượt xem</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 visible-lg-block">
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin-left:-50px;">Lượt trả lời</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 visible-lg-block">
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin-left:-20px;">Chủ đề</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 visible-lg-block">
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin-left:-70px;">Người đăng</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    while($row=mysqli_fetch_array($result)){
                                                        $small = $row['content'];
                                                        $html = str_get_html($small)->plaintext;
                                                        $rutgon = words($html, 30);
                                                        echo "<div class='row' style='border-bottom:dashed 1px #d2d2d2;margin:20px 50px;'>
                                                        <div class='col-md-7'>
                                                            <div id='tieude_tintuc'>
                                                                <a href='article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}'>" .$row['namearticle']. "</a>
                                                            </div>
                                                            <div style='font-size:12px;padding-bottom:10px;'>" .$row['datepost']. "</div>
                                                            <div class='dv-mota-tintuc'>" .$rutgon. "</div>
                                                        </div>
                                                        <div class='col-md-1' style='padding-top:30px;'>
                                                            <a title='Lượt xem'>" .$row['countview']. "</a>
                                                        </div>
                                                        <div class='col-md-1' style='padding-top:30px;'>
                                                            <a title='Lượt trả lời'>" .$row['countcomment']. "</a>
                                                        </div>
                                                        <div class='col-md-2' style='padding-top:30px;'>
                                                            <a href='topic.php?idtopic={$row['idtopic']}' title='Chủ đề' style='color:black;'><span class='glyphicon glyphicon-stop' style='color:{$row['color']};'></span> {$row['nametopic']}</a>
                                                        </div>
                                                        <div class='col-md-1' style='padding-top:15px;'>
                                                            <a href='profile.php?iduser={$row['iduser']}' title='Đăng bởi {$row['fullname']}'><img class='img-circle img-responsive' src='upload/{$row['avatar']}' style='width:50px;height:50px;' alt='/'></a>
                                                        </div>
                                                        <div class='clear'> </div>
                                                    </div>";
                                                    }
                                            }else{
                                                // của trang home
                                                $sql = "SELECT * FROM article, topic, user WHERE ((article.iduser=user.iduser) AND (article.idtopic=topic.idtopic) AND (article.state = '1') AND (article.iduser = '1'))  ORDER BY datepost DESC LIMIT 20";
                                                $result = mysqli_query($con, $sql);
                                                
                                                    ?>

                                                    <div class="row">
                                                        <div class="btn-group col-md-4 col-md-offset-2 col-xs-push-1">
                                                            <div class="btn btn-default">
                                                                <div><a href="#/" style="font-size:16px;color:black;">Mới nhất</a></div>
                                                            </div>
                                                            <div class="btn btn-default">
                                                                <div><a href="#orderview" style="font-size:16px;color:black;">Xem nhiều nhất</a></div>
                                                            </div>
                                                            <div class="btn btn-default active">
                                                                <div><a href="#orderadmin" style="font-size:16px;color:black;">Admin</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 col-md-offset-1 visible-lg-block">
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin-left:-30px;">Lượt xem</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 visible-lg-block">
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin-left:-50px;">Lượt trả lời</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 visible-lg-block">
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin-left:-20px;">Chủ đề</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 visible-lg-block">
                                                            <div class="row">
                                                                <div class="col-md-12" style="margin-left:-70px;">Người đăng</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    while($row=mysqli_fetch_array($result)){
                                                    $small = $row['content'];
                                                    $html = str_get_html($small)->plaintext;
                                                    $rutgon = words($html, 30);
                                                    echo "<div class='row' style='border-bottom:dashed 1px #d2d2d2;margin:20px 50px;'>
                                                    <div class='col-md-7'>
                                                        <div id='tieude_tintuc'>
                                                            <a href='article.php?idtopic={$row['idtopic']}&idarticle={$row['idarticle']}'>" .$row['namearticle']. "</a>
                                                        </div>
                                                        <div style='font-size:12px;padding-bottom:10px;'>" .$row['datepost']. "</div>
                                                        <div class='dv-mota-tintuc'>" .$rutgon. "</div>
                                                    </div>
                                                    <div class='col-md-1' style='padding-top:30px;'>
                                                        <a title='Lượt xem'>" .$row['countview']. "</a>
                                                    </div>
                                                    <div class='col-md-1' style='padding-top:30px;'>
                                                        <a title='Lượt trả lời'>" .$row['countcomment']. "</a>
                                                    </div>
                                                    <div class='col-md-2' style='padding-top:30px;'>
                                                        <a href='topic.php?idtopic={$row['idtopic']}' title='Chủ đề' style='color:black;'><span class='glyphicon glyphicon-stop' style='color:{$row['color']};'></span> {$row['nametopic']}</a>
                                                    </div>
                                                    <div class='col-md-1' style='padding-top:15px;'>
                                                        <a href='profile.php?iduser={$row['iduser']}' title='Đăng bởi {$row['fullname']}'><img class='img-circle img-responsive' src='upload/{$row['avatar']}' style='width:50px;height:50px;' alt='/'></a>
                                                    </div>
                                                    <div class='clear'> </div>
                                                </div>";
                                                }
                                            }
                                        }

                                    mysqli_close($con);
                                    ?>

