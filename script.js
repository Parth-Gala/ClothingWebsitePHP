const bar = document.getElementById('bar');
const nav = document.getElementById('navbar');
const close = document.getElementById('close');
  if (bar) {
      bar.addEventListener('click', () => {
          nav.classList.add('active');
      })
  }
  if (close) {
      close.addEventListener('click', () => {
          nav.classList.remove('active');
      })
}
  

function send_otp(){
	var email=jQuery('#email').val();
	jQuery.ajax({
		url:'send.php',
		type:'post',
		data:'email='+email,
		success:function(result){
			if(result=='yes'){
				jQuery('.second_box').show();
				jQuery('.first_box').hide();
			}
			if(result=='not_exist'){
				jQuery('#email_error').html('Please enter valid email');
			}
		}
	});
}