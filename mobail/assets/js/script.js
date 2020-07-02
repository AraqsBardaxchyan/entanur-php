<script>
$(document).ready(function(){
 $('#uploadImage').submit(function(event){
  if($('#uploadFile').val())
  {
   event.preventDefault();
   $('#loader-icon').show();
   $('#targetLayer').hide();
   $(this).ajaxSubmit({
    target: '#targetLayer',
    beforeSubmit:function(){
     $('.progress-bar').width('50%');
    },
    uploadProgress: function(event, position, total, percentageComplete)
    {
     $('.progress-bar').animate({
      width: percentageComplete + '%'
     }, {
      duration: 1000
     });
    },
    success:function(){
     $('#loader-icon').hide();
     $('#targetLayer').show();
    },
    resetForm: true
   });
  }
  return false;
 });
});
</script>