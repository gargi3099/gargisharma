<?php if(isset($_POST['cf_submit'])) {    
   $errors = array();
   $success = null;
   
   $required_fields['cf_name'] = 'You are required to enter your Name.';
   $required_fields['cf_email'] = 'You are required to enter your E-mail Address.';
   $required_fields['cf_subject'] = 'You are required to enter a Subject.';
   $required_fields['cf_message'] = 'You are required to enter a Message.';
                   
   foreach($_POST as $key => $value) {
      if(array_key_exists($key, $required_fields)) {
         if(trim($_POST[$key]) === '') {
             $errors[$key] = $required_fields[$key];
          }
       }
    }

    if(empty($errors)) {
         $to = "gargi3099@gmail.com";
         $subject = $_POST['cf_subject'];
         $name_field = $_POST['cf_name'];
         $email_field = $_POST['cf_email'];
         $message = $_POST['cf_message'];
         $company = $_POST['cf_company'];
        
         $body = "From: $name_field\n Company: $company\n E-Mail: $email_field\n Message:\n $message";
         $success = mail($to, $subject, $body);
    }
    
    if($success) {
         //alert("Message sent! Thank you!");
              echo "<p><strong>Thank you for getting in touch. Expect to hear back from us soon.</strong></p>";
         } else {
         // alert("Error sending message");
              echo "<strong>Error sending email! </strong>";
         }
    }

    if(!empty($errors)) {
         echo "<strong>Please check the following errors:</strong><br/><br/>";
         echo "<ul>";
         foreach($errors as $value) {         
              echo "<li>$value</li>";      
         }
         echo "</ul>";
    } ?>

<form action="" method="post">
    <input name="cf_name" type="text" id="cf_name" class="cf_input" value="<?php if(isset($_POST['cf_name'])) echo $_POST['cf_name'];?>" placeholder="Name*">
    <input name="cf_email" type="email" id="cf_email" class="cf_input" value="<?php if(isset($_POST['cf_email'])) echo $_POST['cf_email'];?>" placeholder="Email*">
    <input name="cf_subject" type="text" id="cf_subject"  class="cf_input" value="<?php if(isset($_POST['cf_subject'])) echo $_POST['cf_subject'];?>" placeholder="Subject*">
    <textarea name="cf_message" cols="45" rows="6" id="cf_message" value="<?php if(isset($_POST['cf_message'])) echo $_POST['cf_message'];?>" placeholder="Message*" class="cf_text"></textarea>
    <button type="submit" name="cf_submit">Send Message</button>
</form>