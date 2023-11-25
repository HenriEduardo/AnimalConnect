<?php



?>

<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="feed p-2">
           
                <div class="panel-body inf-content">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-circle img-thumbnail isTooltip" src="../images/perfil/<?= $infoUser['img']?>"
                                onerror="this.onerror=null;this.src='https://www.pngmart.com/files/21/Account-User-PNG-Photo.png';" width="300" height="300"
                            >
                            <?php

                                if($idUsuario == $_SESSION['id']){

                            ?>
                            <input type="hidden" id="id-usuario" name="id-usuario" value="<?= $idUsuario ?>"> 
                            <ul title="Ratings" class="list-inline ratings text-center p-3">
                                <button class="btn btn-primary btn-round">
                                    <a class="link-as-button" href="<?=URL?>/EditarPerfil" style="color: white; text-decoration: none">Editar Perfil</a>
                                </button>
                            </ul>
                            <?php

                                }else if($seguindo){

                            ?>
                            <form action="<?=URL?>/request/deixarDeSeguir" method="POST">
                                <input type="hidden" id="id-usuario" name="id-usuario" value="<?= $idUsuario ?>"> 
                                <ul title="Ratings" class="list-inline ratings text-center p-3">
                                    <button class="btn btn-primary btn-round">Deixar de seguir</button>
                                </ul>
                            </form>
                            <?php 

                                } else {

                            ?>
                            <form action="<?=URL?>/request/seguir" method="POST">
                                <input type="hidden" id="id-usuario" name="id-usuario" value="<?= $idUsuario ?>"> 
                                <ul title="Ratings" class="list-inline ratings text-center p-3">
                                    <button class="btn btn-primary btn-round">Seguir</button>
                                </ul>
                            </form>
                            <?php
                             
                                } 

                            ?>
                            <div class="col-md-12" style="text-align: center">
                                <p><?= $qtdSeguidores ?> seguidores </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <strong>Informações</strong><br>
                            <div class="table-responsive">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>    
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                                Nome do animal de estimação                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <div ><span><?= $infoUser['nomeAnimal']?></span></div>     
                                        </td>
                                    </tr>
                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                                Usuário                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <div ><span><?= $infoUser['usuario']?></span></div>  
                                        </td>
                                    </tr>

                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                                Nome do dono                                                
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <div ><span><?= $infoUser['nome']?></span></div>
                                        </td>
                                    </tr>

                                    <tr>        
                                        <td>
                                            <strong>
                                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                Data de nascimento do animal de estimação                                             
                                            </strong>
                                        </td>
                                        <td class="text-primary">
                                            <div><span><?= $ctl->transformDataBr($infoUser['dataNascimentoAnimal'])?></span></div>
                                        </td>
                                    </tr>                                    
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>                                      

                <?php

                    foreach($postUser as $pub){

                ?>

                <div class="bg-white border mt-2">
                    <div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                            <div class="d-flex flex-row align-items-center feed-text px-2">
                                <img class="rounded-circle" src="../images/perfil/<?= $pub['img']?>"
                                    onerror="this.onerror=null;this.src='https://www.pngmart.com/files/21/Account-User-PNG-Photo.png';" width="45" height="45"
                                >
                                <div class="d-flex flex-column flex-wrap ml-2" id="'.$id.'"><span class="font-weight-bold"><a href="<?= URL ?>/Usuario/<?= $pub['id_usuario']?>"><?= $pub['usuario']?></a></span><span class="text-black-50 time"><?= $ctl->trasnformDataEHora($pub['dataPublicacao'])?></span></div>
                            </div>
                            <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                        </div>
                    </div>
                    <div class="p-2 px-3"><span><?= $pub['texto']?></span></div>
                    <?php

                        if (isset($pub['imagem']) && !empty($pub['imagem'])){

                    ?>

                    <div class="feed-image p-2 px-3"><img class="img-fluid img-responsive" src="../images/post/<?= $pub['imagem']?>"/></div>

                    <?php 

                        } 

                    ?>
                    <div class="d-flex justify-content-end socials p-2 py-3"> 
                        
                        <?php

                            if ($pub['likepub'] == 0){

                        ?>
                            <form action="<?=URL?>/request/like" method="POST"> 
                                <input type="hidden" id="id-publicacao" name="id-publicacao" value="<?= $pub['id'] ?>"> 
                                <button class="btn" type="submit">
                                    <i class="btLike fa fa-thumbs-up" style="font-size: 30px;"></i>
                                </button> 
                            </form> <a href="<?=URL?>/Comentario/<?= $pub['id']?>"> <i class="fa fa-comments-o" style="font-size: 30px;"></i> </a>
                        <?php 
                        
                            } else {

                        ?>
                            <form action="<?=URL?>/request/deslike" method="POST"> 
                                <input type="hidden" id="id-publicacao" name="id-publicacao" value="<?= $pub['id'] ?>"> 
                                <button class="btn" type="submit">
                                    <i class="fa fa-thumbs-up" style="font-size: 30px; color: rgb(0, 170, 255)"></i> <p></p>
                                </button> 
                            </form> <a href="<?=URL?>/Comentario/<?= $pub['id']?>"> <i class="fa fa-comments-o" style="font-size: 30px;"></i> </a>
                        <?php 
                        
                            }

                        ?>
                    </div>
                </div>

                <?php 

                    } 

                ?>

            </div>
        </div>
    </div>
</div>

