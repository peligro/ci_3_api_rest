<?php
/**
 *
 * @About     Interface básica API Rest con Slim Framework (http://docs.slimframework.com)
 * @File      index.php
 * @Date      Nov-2017
 * @Version   1.0
 * @Developer César Cancino (yo@cesarcancino.com)
 * 
 **/
require_once('core/core.php');
require_once('core/datos.php');
/**
 * noticias
 * */
 $app->get('/peticion/:id','authenticate', function ($id) use ($app)  
 {
    if(filter_var( trim($id),FILTER_VALIDATE_INT )==false)
    {
        $response=array
        (
            array
            (
                'error'=>'1',
                'mensaje'=>'Recurso no disponible'
            )
        );
        getResponse(401,$response);
    }else
    {
        if($id=='1')
        {
            $response=array
            (
               array
               (
                'id'=>'1',
                'titulo'=>'PDI investiga nuevo tipo de estafa bancaria: cambiazo del digipass',
                "bajada"=>'Delincuente simuló ser ejecutivo e indicó a cliente que su dispositivo estaba con fallas y que sería reemplazado.',
                'fecha'=>'2 de Enero de 2018 a las 14:20',
                'foto'=>'https://cdn.filepicker.io/api/file/1J65HfReRlCdH3kBEThg'
               ),
            );
            getResponse(200,$response);
        }else
        {
            $response=array
            (
               array
               (
                'id'=>'1',
                'titulo'=>'PDI investiga nuevo tipo de estafa bancaria: cambiazo del digipass',
                "bajada"=>'Delincuente simuló ser ejecutivo e indicó a cliente que su dispositivo estaba con fallas y que sería reemplazado.',
                'fecha'=>'2 de Enero de 2018 a las 14:20',
                'foto'=>'https://cdn.filepicker.io/api/file/1J65HfReRlCdH3kBEThg'
               ),
               array
               (
                'id'=>'2',
                'titulo'=>'¿Quiénes son los principales destinatarios del salario mínimo?',
                "bajada"=>'Desde julio de 2014 el ingreso mínimo ha tenido un incremento de $51 mil. En esa fecha eran más de 200 mil trabajadores los que lo recibían, mientras que actualmente son cerca de 170 mil empleados.',
                'fecha'=>'2 de Enero de 2018 a las 11:00',
                'foto'=>'https://cdn.filepicker.io/api/file/nFqb3ZgSF2eMgN6Sy9Mr'
               ),
               array
               (
                'id'=>'3',
                'titulo'=>'Coeymans y Censo 2017: “ Es inexplicable el aumento de población en estas cifras finales”',
                "bajada"=>'El ex director del INE señaló que si bien “en un Censo de hecho ocurre una variación de la población muy marginal, no como ahora en que el aumento corresponde a más de 200 mil personas entre la primera y segunda entrega de resultados”.',
                'fecha'=>'29 de Diciembre de 2017 a las 12:53',
                'foto'=>'https://cdn.filepicker.io/api/file/4EedtxULSp2dmFKAG5dL'
               ),
               array
               (
                'id'=>'4',
                'titulo'=>'Mujeres que cotizan más de 35 años jubilan con $330 mil y hombres alcanzan los $600 mil',
                "bajada"=>'Cifra corresponde a quienes se jubilaron en noviembre pasado y no considera beneficios estatales. Pensión promedio de las mujeres en el mes fue de $179.633 y de los hombres $273.192.',
                'fecha'=>'29 de Diciembre de 2017 a las 12:38',
                'foto'=>'https://cdn.filepicker.io/api/file/heu0keBSQCiUqAkSg9B6'
               ),
            );
            getResponse(200,$response);
        }
    }
    
});
/*
Método POST con parámetros
*/
$app->post('/peticion', function() use ($app)  {
    $param['parametro1']  = $app->request->post('parametro1');
    $param['parametro2'] = $app->request->post('parametro2');
     if ( is_array($param) ) 
     {
        $response=array
            (
               array
               (
                'Parámetros'=>'parametro1='.$app->request->post('parametro1').' parametro2='.$param['parametro2'],
               ),
               
            );
            $d=new Datos();
            $sql="insert into api_rest 
                  values 
                  (null,'".$app->request->post('parametro1')."','".$app->request->post('parametro2')."');
            ";
            $d->setDatos($sql);
            getResponse(201,$response);
     }else
     {
        $response=array
        (
            array
            (
                'error'=>'1',
                'mensaje'=>'Recurso no disponible'
            )
        );
        getResponse(401,$response);
     }
 });
/*
Método PUT con parámetros
*/
$app->put('/peticion/:id', function($id) use ($app)  {
    if(filter_var( trim($id),FILTER_VALIDATE_INT )==false)
    {
        
        $response=array
        (
            array
            (
                'error'=>'1',
                'mensaje'=>'Recurso no disponible '
            )
        );
        getResponse(401,$response);
    }else
    {
      $param['parametro1']  = $app->request->post('parametro1');
      $param['parametro2'] = $app->request->post('parametro2');
     if ( is_array($param) ) 
     {
        $response=array
            (
               array
               (
                'Parámetros'=>'parametro1='.$app->request->put('parametro1').' parametro2='.$param['parametro2'],
               ),
               
            );
            $d=new Datos();
            $sql="update api_rest 
                  set
                  parametro1='".$app->request->post('parametro1')."',
                  parametro2='".$app->request->post('parametro2')."'
                  where 
                  id='".$id."';
            ";
            $d->setDatos($sql);
            getResponse(201,$response);
     }else
     {
        $response=array
        (
            array
            (
                'error'=>'1',
                'mensaje'=>'Recurso no disponible'
            )
        );
        getResponse(401,$response);
     }
    }
    
 });
/**
 * petición DELETE
 * */ 

$app->delete('/peticion/:id','authenticate', function($id) use ($app)  {
    if(filter_var( trim($id),FILTER_VALIDATE_INT )==false)
    {
        
        $response=array
        (
            array
            (
                'error'=>'1',
                'mensaje'=>'Recurso no disponible'
            )
        );
        getResponse(401,$response);
    }else
    {
        $response=array
        (
            array
            (
                'error'=>'0',
                'mensaje'=>'Recurso disponible delete',
                "id"=>$id,
            )
        );
        $d=new Datos();
            $sql="delete from api_rest
                  where 
                  id='".$id."';
            ";
            $d->setDatos($sql);
         getResponse(200,$response);
    }
 });
/**
 * correr la APP
 * */
$app->run();

