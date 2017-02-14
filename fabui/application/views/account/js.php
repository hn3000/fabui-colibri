<?php
/**
 * 
 * @author Krios Mane
 * @version 0.1
 * @license https://opensource.org/licenses/GPL-3.0
 * 
 */
 
?>
<script type="text/javascript">
	$(document).ready(function() {
		initLanguage();
		initFormValidator();
		$("#save").on('click', saveUser);
	});
	/**
	*
	*/
	function initLanguage()
	{
		$("#settings-language").val('<?php echo $this->session->user['settings']['language'] ?>');
	}
	/**
	*
	*/
	function initFormValidator()
	{
		$("#user-form").validate({
			// Rules for form validation
			rules : {
				email : {
					required : true,
					email : true
				},
				first_name : {
					required : true
				},
				last_name : {
					required: true
				}
			},
			// Messages for form validation
			messages : {
				email : {
					required : '<?php echo _("Please enter your email address");?>',
					email : '<?php echo _("Please enter a valid email address") ?>'
				},
				first_name : {
					required : '<?php echo _("Please enter your first name")?>'
				},
				last_name : {
					required : '<?php echo _("Please enter your last name")?>'
				}
			},
			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
	}
	/**
	*
	**/
	function saveUser()
	{
		console.log($("#user-form").valid());
		if($("#user-form").valid()){
			var fields = $( "#user-form :input" ).serializeArray();
			var data = {};
			jQuery.each( fields, function( index, object ) {
				data[object.name] = object.value;
			});

			$.ajax({
				type: 'post',
				url: '<?php echo site_url('account/saveUser/'.$this->session->user['id']); ?>',
				data : data,
				dataType: 'json'
			}).done(function(response) {
				
			});
		}
	}
</script>