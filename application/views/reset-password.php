<?php echo validation_errors();?>
<?php
echo form_open();

echo form_label('Email');
echo form_input('email', set_value('email'));

echo form_submit('submit', 'Reset password');

echo form_close();
?>