/*Chuyển đổi chuỗi sang mảng

Để chuyển một chuỗi sang mảng thì ta sử dụng hàm split() với tham số truyền vào là ký tự ngăn cách giữa các phần tử.

Ví dụ: XEM DEMO

string = "Welcome freetuts.net";

// Tạo thành mảng với mỗi phần tử ngăn bởi khoảng trắng
// kết quả là mảng có hai phần tử gồm: welcome và feetuts.net
document.write(string.split(" ").length);*/
/*check ho ten*/
function onfocus_fullname(){
	document.regis.fullname.value="";
	document.regis.lblFullname.style.display="none";
	document.regis.fullname.style.display="";
	document.regis.fullname.focus();
} /*click chuot vao se de trong neu o chua nhap gi*/
function check_fullname(){
	var fullname=document.regis.fullname.value; /*gan bien cho noi dung o fullname*/
	var fullname_response=document.getElementById("fullname_response"); /*lay element co id = fullname_response luu vao bien fullname_response*/
	var fullname_noti='<img src="images/ico_unvalid.png"> Xin vui lòng nhập đúng họ tên.'; /*bien noti hien error*/
	if (fullname==""){
		document.regis.lblFullname.value="Nhập họ tên...";
		document.regis.lblFullname.style.display="";
		document.regis.fullname.style.display="none";
		return false;
	} /*chua nhap gi se hien lai dong chu ban dau*/
	if (fullname.length<10) {
		fullname_response.innerHTML=fullname_noti; /*thay doi noi dung cho bien fullname_response thanh noi dung cua bien fname_noti*/
		fullname_response.className="noti"; /*gan class=noti cho div co id=fullname_response*/
		fullname_response.style.display=""; /*style display cua fullname_response thay doi thanh rong*/
		return false;
	}
	fullname_response.innerHTML='<img src="images/ico_valid.gif"> Họ tên hợp lệ.';
	fullname_response.className="noti";
	fullname_response.style.display="";
	return true; /*nhap dung tra ve true*/
} /*click chuot ra ngoai se thuc hien kiem tra noi dung nhap*/

/*Kiem tra mat khau*/
function onfocus_password(){
		document.regis.password.value="";
		document.regis.lblPassword.style.display = "none";
		document.regis.password.style.display = "";
		document.regis.password.focus();
	}
	
function check_password(){
	var password = document.regis.password.value;
	var password_response = document.getElementById("password_response");
	var password_noti = '<img src="images/ico_unvalid.png"> Xin vui lòng chọn mật khẩu với độ dài ít nhất là 6 kí tự. Mật khẩu phải chứa ít nhất 1 ký tự (a-z) và 1 ký tự số .';
	if(password == ""){
		document.regis.lblPassword.value = "Mật khẩu...";
		document.regis.lblPassword.style.display = "";
		document.regis.password.style.display = "none";
		return false;
	}
	if (password.length <6) {
		password_response.innerHTML=password_noti; /*thay doi noi dung cho bien password_response thanh noi dung cua bien password_noti*/
		password_response.className="noti"; /*gan class=noti cho div co id=password_response*/
		password_response.style.display="";
		return false
	}
	if (password.search(/[a-zA-Z]/) == -1) {
		password_response.innerHTML=password_noti; /*thay doi noi dung cho bien password_response thanh noi dung cua bien password_noti*/
		password_response.className="noti"; /*gan class=noti cho div co id=password_response*/
		password_response.style.display="";
		return false
	}
	if (password.search(/\d/) == -1) {
		password_response.innerHTML=password_noti; /*thay doi noi dung cho bien password_response thanh noi dung cua bien password_noti*/
		password_response.className="noti"; /*gan class=noti cho div co id=password_response*/
		password_response.style.display="";
		return false
	}
	password_response.innerHTML = '<img src="images/ico_valid.gif"> Mật khẩu hợp lệ.';
	password_response.className = "noti";
	password_response.style.display = "";
	return true;
}

// kiểm tra tên đăng nhập
function onfocus_username(){
	document.regis.username.value="";
	document.regis.lblUsername.style.display="none";
	document.regis.username.style.display="";
	document.regis.username.focus();
} /*click chuot vao se de trong neu o chua nhap gi*/
function check_username() {
	var username = document.regis.username.value;
	var username_noti = '<img src="images/ico_unvalid.png"> Tên đăng nhập chỉ có thể chứa các ký tự a-z,A-Z, 0-9, gạch dưới (_) và dấu chấm (.) !';
	var username_response = document.getElementById("username_response");
	if (username==""){
		document.regis.lblUsername.value="Tên đăng nhập...";
		document.regis.lblUsername.style.display="";
		document.regis.username.style.display="none";
		return false;
	}
	if((username.search(/[^0-9a-zA-Z_.]/) != -1) || (username=="admin")){	
		username_response.innerHTML=username_noti; /*thay doi noi dung cho bien username_response thanh noi dung cua bien username_noti*/
		username_response.className="noti"; /*gan class=noti cho div co id=username_response*/
		username_response.style.display="";
		return false;
	}
	var error_length ='<img src="images/ico_unvalid.png"> Tên đăng nhập phải lớn hơn 3 ký tự và nhỏ hơn 15 ký tự!';
	if(username.length < 4 || username.length > 14){
		username_response.innerHTML=username_noti; /*thay doi noi dung cho bien username_response thanh noi dung cua bien username_noti*/
		username_response.className="noti"; /*gan class=noti cho div co id=username_response*/
		username_response.style.display="";
		return false;
	}
	username_response.innerHTML = '<img src="images/ico_valid.gif"> Tên đăng nhập hợp lệ.';
	username_response.className="noti";
	username_response.style.display="";
	return true;
}

/*check so dien thoai*/
function onfocus_phone_number(){
	document.regis.phone_number.value="";
	document.regis.lblPhoneNumber.style.display="none";
	document.regis.phone_number.style.display="";
	document.regis.phone_number.focus();
} /*click chuot vao se de trong neu o chua nhap gi*/
function check_phone_number(){
	var phone_number=document.regis.phone_number.value; /*gan bien cho noi dung o phone_number*/
	var phone_number_response=document.getElementById("phone_number_response"); /*lay element co id = phone_number_response luu vao bien phone_numberresponse*/
	var phone_number_noti='<img src="images/ico_unvalid.png"> Xin vui lòng nhập đúng số điện thoại.'; /*bien noti hien error*/
	if (phone_number==""){
		document.regis.lblPhoneNumber.value="";
		document.regis.lblPhoneNumber.style.display="";
		document.regis.phone_number.style.display="none";
		return false;
	} /*chua nhap gi se hien lai dong chu ban dau*/
	if (isNaN(phone_number) || phone_number.length<10 || phone_number.length>11) {
		phone_number_response.innerHTML=phone_number_noti; /*thay doi noi dung cho bien phone_number_response thanh noi dung cua bien phone_number_noti*/
		phone_number_response.className="noti"; /*gan class=noti cho div co id=phone_number_response*/
		phone_number_response.style.display="";
		return false;
	}
	phone_number_response.innerHTML='<img src="images/ico_valid.gif"> Họ tên hợp lệ.';
	phone_number_response.className="noti";
	phone_number_response.style.display="";
	return true; /*nhap dung tra ve true*/
} /*click chuot ra ngoai se thuc hien kiem tra noi dung nhap*/

/*check email*/
function onfocus_email(){
	document.regis.email.value="";
	document.regis.lblEmail.style.display="none";
	document.regis.email.style.display="";
	document.regis.email.focus();
} /*click chuot vao se de trong neu o chua nhap gi*/
function check_email(){
	var email=document.regis.email.value; /*gan bien cho noi dung o email*/
	var email_response=document.getElementById("email_response"); /*lay element co id = emailresponse luu vao bien emailresponse*/
	var email_noti='<img src="images/ico_unvalid.png"> Định dạng email không chính xác.'; /*bien noti hien error*/
	if (email==""){
		document.regis.lblEmail.value="Nhập email...";
		document.regis.lblEmail.style.display="";
		document.regis.email.style.display="none";
		return false;
	} /*chua nhap gi se hien lai dong chu ban dau*/
	if(email.search(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i) == -1){
		email_response.innerHTML = email_noti;
		email_response.className = "noti";
		email_response.style.display="";
		return false;
	}
	email_response.innerHTML='<img src="images/ico_valid.gif"> Email hợp lệ.';
	email_response.className="noti";
	email_response.style.display="";
	return true; /*nhap dung tra ve true*/
} /*click chuot ra ngoai se thuc hien kiem tra noi dung nhap*/

function onfocus_city(){
	document.regis.city.value="";
	document.regis.lblCity.style.display="none";
	document.regis.city.style.display="";
	document.regis.city.focus();
} /*click chuot vao se de trong neu o chua nhap gi*/
function check_city(){
	var city=document.regis.city.value; /*gan bien cho noi dung o city*/
	var city_response=document.getElementById("city_response"); /*lay element co id = city_response luu vao bien city_response*/
	var city_noti='<img src="images/ico_unvalid.png"> Xin vui lòng nhập đúng Tỉnh/TP.'; /*bien noti hien error*/
	if (city==""){
		document.regis.city.value="";
		return false;
	} /*chua nhap gi se hien lai dong chu ban dau*/
	if (city.length<5) {
		city_response.innerHTML=city_noti; /*thay doi noi dung cho bien city_response thanh noi dung cua bien city_noti*/
		city_response.className="noti"; /*gan class=noti cho div co id=city_response*/
		city_response.style.display="";
		return false;
	}
	city_response.innerHTML='<img src="images/ico_valid.gif"> Họ tên hợp lệ.';
	city_response.className="noti";
	city_response.style.display="";
	return true; /*nhap dung tra ve true*/
}
function onfocus_content(){
	document.regis.content.value="";
	document.regis.lblContent.style.display="none";
	document.regis.content.style.display="";
	document.regis.content.focus();
} /*click chuot vao se de trong neu o chua nhap gi*/
function check_content(){
	var content=document.regis.content.value; /*gan bien cho noi dung o content*/
	var content_response=document.getElementById("content_response"); /*lay element co id = content_response luu vao bien content_response*/
	var content_noti='<img src="images/ico_unvalid.png"> Xin vui lòng nhập nội dung cần tư vấn'; /*bien noti hien error*/
	if (content==""){
		document.regis.content.value="";
		return false;
	} /*chua nhap gi se hien lai dong chu ban dau*/
	if (content.length<50) {
		content_response.innerHTML=content_noti; /*thay doi noi dung cho bien content_response thanh noi dung cua bien content_noti*/
		content_response.className="noti"; /*gan class=noti cho div co id=content_response*/
		content_response.style.display="";
		return false;
	}
	content_response.innerHTML='<img src="images/ico_valid.gif"> Họ tên hợp lệ.';
	content_response.className="noti";
	content_response.style.display="";
	return true; /*nhap dung tra ve true*/
}

/*Check toan form*/
function validate(){
	var username = document.regis.username.value;
	var username_noti = '<img src="images/ico_unvalid.png"> Tên đăng nhập chỉ có thể chứa các ký tự a-z,A-Z, 0-9, gạch dưới (_) và dấu chấm (.)!';
	var username_response = document.getElementById("username_response");
	var password = document.regis.password.value;
	var password_response = document.getElementById("password_response");
	var password_noti = '<img src="images/ico_unvalid.png"> Xin vui lòng chọn mật khẩu với độ dài ít nhất là 6 kí tự. Mật khẩu phải chứa ít nhất 1 ký tự (a-z) và 1 ký tự số .';
	var fullname=document.regis.fullname.value; /*gan bien cho noi dung o fullname*/
	var fullname_response=document.getElementById("fullname_response"); /*lay element co id = fullname_response luu vao bien fullname_response*/
	var fullname_noti='<img src="images/ico_unvalid.png"> Xin vui lòng nhập đúng họ tên.';
	var phone_number=document.regis.phone_number.value; /*gan bien cho noi dung o phone_number*/
	var phone_number_response=document.getElementById("phone_number_response"); /*lay element co id = phone_number_response luu vao bien phone_numberresponse*/
	var phone_number_noti='<img src="images/ico_unvalid.png"> Xin vui lòng nhập đúng số điện thoại.';
	var email=document.regis.email.value; /*gan bien cho noi dung o email*/
	var email_response=document.getElementById("email_response"); /*lay element co id = emailresponse luu vao bien emailresponse*/
	var email_noti='<img src="images/ico_unvalid.png"> Định dạng email không chính xác.';
	var city=document.regis.city.value; /*gan bien cho noi dung o city*/
	var city_response=document.getElementById("city_response"); /*lay element co id = city_response luu vao bien city_response*/
	var city_noti='<img src="images/ico_unvalid.png"> Xin vui lòng nhập đúng Tỉnh/TP.';
	var content=document.regis.content.value; /*gan bien cho noi dung o content*/
	var content_response=document.getElementById("content_response"); /*lay element co id = content_response luu vao bien content_response*/
	var content_noti='<img src="images/ico_unvalid.png"> Xin vui lòng nhập nội dung cần tư vấn';
	if((username.length < 4 || username.length > 14) || (username.search(/[^0-9a-zA-Z_.]/) != -1) || (username=="admin")){
		username_response.innerHTML=username_noti; /*thay doi noi dung cho bien username_response thanh noi dung cua bien username_noti*/
		username_response.className="noti"; /*gan class=noti cho div co id=username_response*/
		username_response.style.display="";
		alert('Vui lòng nhập tên đăng nhập hợp lệ!');
		return false;	
	}
	if((password.length <6) || (password.search(/[a-zA-Z]/) == -1) || (password == "Mật khẩu...") || (password.search(/\d/) == -1)) {
		password_response.innerHTML=password_noti; /*thay doi noi dung cho bien password_response thanh noi dung cua bien password_noti*/
		password_response.className="noti"; /*gan class=noti cho div co id=password_response*/
		password_response.style.display="";
		alert('Vui lòng nhập mật khẩu hợp lệ!');
		return false;	
	}
	if (fullname.length<10) {
		alert('Họ tên phải chứa ít nhất 10 kí tự.');
		fullname_response.innerHTML=fullname_noti; /*thay doi noi dung cho bien fullname_response thanh noi dung cua bien fullname_noti*/
		fullname_response.className="noti"; /*gan class=noti cho div co id=fullname_response*/
		fullname_response.style.display="";
		return false;
	}
	if (isNaN(phone_number) || phone_number.length<10 || phone_number.length>11) {
		alert('Vui lòng nhập đúng số điện thoại.');
		phone_number_response.innerHTML=phone_number_noti; /*thay doi noi dung cho bien phone_number_response thanh noi dung cua bien phone_number_noti*/
		phone_number_response.className="noti"; /*gan class=noti cho div co id=phone_number_response*/
		phone_number_response.style.display="";
		return false;
	}
	if(email.search(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i) == -1){
		alert('Định dạng email không chính xác.');
		email_response.innerHTML = email_noti;
		email_response.className = "noti";
		email_response.style.display="";
		return false;
	}
	if (city.length<5) {
		alert('Tên Tỉnh/TP không chính xác.');
		city_response.innerHTML=city_noti; /*thay doi noi dung cho bien city_response thanh noi dung cua bien city_noti*/
		city_response.className="noti"; /*gan class=noti cho div co id=city_response*/
		city_response.style.display="";
		return false;
	}
	if (content.length<50) {
		alert('Nội dung cần tư vấn không chính xác.');
		content_response.innerHTML=content_noti; /*thay doi noi dung cho bien content_response thanh noi dung cua bien content_noti*/
		content_response.className="noti"; /*gan class=noti cho div co id=content_response*/
		content_response.style.display="";
		return false;
	}
	return true;
}

/*Kiem tra mat khau*/
function onfocus_password1(){
		document.login.password1.value="";
		document.login.lblPassword1.style.display = "none";
		document.login.password1.style.display = "";
		document.login.password1.focus();
	}
	
function check_password1(){
	var password1 = document.login.password1.value;
	var password_response1 = document.getElementById("password_response1");
	var password_noti1 = '<img src="images/ico_unvalid.png"> Xin vui lòng chọn mật khẩu với độ dài ít nhất là 6 kí tự. Mật khẩu phải chứa ít nhất 1 ký tự (a-z) và 1 ký tự số .';
	if(password1 == ""){
		document.login.lblPassword1.value = "Mật khẩu...";
		document.login.lblPassword1.style.display = "";
		document.login.password1.style.display = "none";
		return false;
	}
	if (password1.length <6) {
		password_response1.innerHTML=password_noti1; /*thay doi noi dung cho bien password_response thanh noi dung cua bien password_noti*/
		password_response1.className="noti"; /*gan class=noti cho div co id=password_response*/
		password_response1.style.display="";
		return false
	}
	if (password1.search(/[a-zA-Z]/) == -1) {
		password_response1.innerHTML=password_noti1; /*thay doi noi dung cho bien password_response thanh noi dung cua bien password_noti*/
		password_response1.className="noti"; /*gan class=noti cho div co id=password_response*/
		password_response1.style.display="";
		return false
	}
	if (password1.search(/\d/) == -1) {
		password_response1.innerHTML=password_noti1; /*thay doi noi dung cho bien password_response thanh noi dung cua bien password_noti*/
		password_response1.className="noti"; /*gan class=noti cho div co id=password_response*/
		password_response1.style.display="";
		return false
	}
	password_response1.innerHTML = '<img src="images/ico_valid.gif"> Mật khẩu hợp lệ.';
	password_response1.className = "noti";
	password_response1.style.display = "";
	return true;
}

// kiểm tra tên đăng nhập
function onfocus_username1(){
	document.login.username.value="";
	document.login.lblUsername.style.display="none";
	document.login.username.style.display="";
	document.login.username.focus();
} /*click chuot vao se de trong neu o chua nhap gi*/
function check_username1() {
	var username1 = document.login.username1.value;
	var username_noti1 = '<img src="images/ico_unvalid.png"> Tên đăng nhập chỉ có thể chứa các ký tự a-z,A-Z, 0-9, gạch dưới (_) và dấu chấm (.) !';
	var username_response1 = document.getElementById("username_response1");
	if (username1==""){
		document.login.lblUsername1.value="Tên đăng nhập...";
		document.login.lblUsername1.style.display="";
		document.login.username1.style.display="none";
		return false;
	}
	if((username1.search(/[^0-9a-zA-Z_.]/) != -1) || (username1=="admin")){	
		username_response1.innerHTML=username_noti1; /*thay doi noi dung cho bien username_response thanh noi dung cua bien username_noti*/
		username_response1.className="noti"; /*gan class=noti cho div co id=username_response*/
		username_response1.style.display="";
		return false;
	}
	var error_length1 ='<img src="images/ico_unvalid.png"> Tên đăng nhập phải lớn hơn 3 ký tự và nhỏ hơn 15 ký tự!';
	if(username1.length < 4 || username1.length > 14){
		username_response1.innerHTML=error_length1; /*thay doi noi dung cho bien username_response thanh noi dung cua bien username_noti*/
		username_response1.className="noti"; /*gan class=noti cho div co id=username_response*/
		username_response1.style.display="";
		return false;
	}
	username_response1.innerHTML = '<img src="images/ico_valid.gif"> Tên đăng nhập hợp lệ.';
	username_response1.className="noti";
	username_response1.style.display="";
	return true;
}

/*check email*/
function onfocus_email1(){
	document.rePass.email1.value="";
	document.rePass.lblEmail1.style.display="none";
	document.rePass.email1.style.display="";
	document.rePass.email1.focus();
} /*click chuot vao se de trong neu o chua nhap gi*/
function check_email1(){
	var email1=document.rePass.email1.value; /*gan bien cho noi dung o email*/
	var email_response1=document.getElementById("email_response1"); /*lay element co id = emailresponse luu vao bien emailresponse*/
	var email_noti1='<img src="images/ico_unvalid.png"> Định dạng email không chính xác.'; /*bien noti hien error*/
	if (email1==""){
		document.rePass.lblEmail1.value="Nhập email...";
		document.rePass.lblEmail1.style.display="";
		document.rePass.email1.style.display="none";
		return false;
	} /*chua nhap gi se hien lai dong chu ban dau*/
	if(email1.search(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i) == -1){
		email_response1.innerHTML = email_noti1;
		email_response1.className = "noti";
		email_response1.style.display="";
		return false;
	}
	email_response1.innerHTML='<img src="images/ico_valid.gif"> Email hợp lệ.';
	email_response1.className="noti";
	email_response1.style.display="";
	return true; /*nhap dung tra ve true*/
} /*click chuot ra ngoai se thuc hien kiem tra noi dung nhap*/

/*Check toan form login*/
function validate1(){
	var username1 = document.regis.username1.value;
	var username_noti1 = '<img src="images/ico_unvalid.png"> Tên đăng nhập chỉ có thể chứa các ký tự a-z,A-Z, 0-9, gạch dưới (_) và dấu chấm (.)!';
	var username_response1 = document.getElementById("username_response1");
	var password1 = document.regis.password.value;
	var password_response1 = document.getElementById("password_response1");
	var password_noti1 = '<img src="images/ico_unvalid.png"> Xin vui lòng chọn mật khẩu với độ dài ít nhất là 6 kí tự. Mật khẩu phải chứa ít nhất 1 ký tự (a-z) và 1 ký tự số .';
	if((username1.length < 4 || username1.length > 14) || (username1.search(/[^0-9a-zA-Z_.]/) != -1) || (username1=="admin")){
		username_response1.innerHTML=username_noti1; /*thay doi noi dung cho bien username_response thanh noi dung cua bien username_noti*/
		username_response1.className="noti"; /*gan class=noti cho div co id=username_response*/
		username_response1.style.display="";
		alert('Vui lòng nhập tên đăng nhập hợp lệ!');
		return false;	
	}
	if((password1.length <6) || (password1.search(/[a-zA-Z]/) == -1) || (password1 == "Mật khẩu...") || (password1.search(/\d/) == -1)) {
		password_response1.innerHTML=password_noti1; /*thay doi noi dung cho bien password_response thanh noi dung cua bien password_noti*/
		password_response1.className="noti"; /*gan class=noti cho div co id=password_response*/
		password_response1.style.display="";
		alert('Vui lòng nhập mật khẩu hợp lệ!');
		return false;	
	}
	return true;
}

function check_comment(){
	var textarea_full = document.change.textarea_full.value;
	//var pt=/^([a-zA-Z]|ă|â|á|à)+"fuck"+"may"/; || (textarea_full.indexOf(pt)) != -1
	//var textarea_full_noti = '<img src="images/ico_unvalid.png"> Bình luận không hợp lệ!';
	// var textarea_full_response = document.getElementById("username_response");
	if((textarea_full=='')){
		//textarea_full_response1.innerHTML=textarea_full_noti1; /*thay doi noi dung cho bien textarea_full_response thanh noi dung cua bien textarea_full_noti*/
		//textarea_full_response1.className="noti"; /*gan class=noti cho div co id=textarea_full_response*/
		//textarea_full_response1.style.display="";
		alert('Vui lòng nhập bình luận hợp lệ!');
		return false;	
	}
	/*var s='ngân';
	if(pt.test(s))
    alert('khớp');
	if((password1.length <6) || (password1.search(/[a-zA-Z]/) == -1) || (password1 == "Mật khẩu...") || (password1.search(/\d/) == -1)) {*/
		/*password_response1.innerHTML=password_noti1; 
		password_response1.className="noti";
		password_response1.style.display="";
		alert('Vui lòng nhập mật khẩu hợp lệ!');
		return false;	
	}*/
	return true;
}

function validate2(){
	var email1=document.rePass.email1.value; /*gan bien cho noi dung o email*/
	var email_response1=document.getElementById("email_response1"); /*lay element co id = emailresponse luu vao bien emailresponse*/
	var email_noti1='<img src="images/ico_unvalid.png"> Định dạng email không chính xác.';
	if(email1.search(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i) == -1){
		alert('Định dạng email không chính xác.');
		email_response1.innerHTML = email_noti1;
		email_response1.className = "noti";
		email_response1.style.display="";
		return false;
	}
	return true;
}