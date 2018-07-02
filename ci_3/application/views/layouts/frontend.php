<?php
$c=$this->uri->segment('1');
$m=$this->uri->segment('2');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title><?php echo $this->layout->getTitle();?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <meta name="keywords" content="<?php echo $this->layout->getKeywords();?>" />
    <meta name="description" content="<?php echo $this->layout->getDescripcion();?>" />
    <meta name="author" content="Tamila.cl" />
    <meta name="copyright" content="Tamila.cl" />
    <meta name="designer" content="Tamila.cl" />
    <meta name="publisher" content="Tamila.cl" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">API REST desde Codeigniter 3</div>
            <div class="panel-body">
                <?php echo $content_for_layout?>
            </div>
        </div>
    </div>
</body>
</html>