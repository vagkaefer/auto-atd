<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Auto-atd - Example form</title>
	<link rel="stylesheet" href="">
  <style>
  body{
    margin:0;
    padding:0;
  }
  input{
    width:99%;
    text-align:center;
    height:60px;
    margin: 10px ;
    font-size:20px;
  }
  .resposta{
    margin: 10px ;
  }
  </style>
</head>
<body>
  
  <div>  	
  	<form action="" method="post">
  		<input type="text" name="pergunta" placeholder="Sua pergunta" <?php if(isset($_POST['pergunta']) && $_POST['pergunta'] != NULL){ echo 'value="'.strip_tags($_POST['pergunta']).'"'; } ?> required>
      <input type="submit" value="ENVIAR">
  	</form>
  </div>  

  <div class="resposta">

  <?php
  if(isset($_POST['pergunta']) && $_POST['pergunta'] != NULL){
    
    require 'autoatd.class.php';

    echo '<h1>Palavras encontradas</h1>';
  
    $autoad = new autoadt();
    $autoad->does_the_magic($_POST['pergunta']);    

  }
  ?>
  
  </div>

</body>
</html>