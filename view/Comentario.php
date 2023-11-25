<?php



?>

<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="feed p-2">

                <div class="bg-white border mt-2">
                    
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                        <div class="d-flex flex-row align-items-center feed-text px-2">
                            <img class="rounded-circle" src="../images/perfil/<?= $pubComentario['img']?>"
                                onerror="this.onerror=null;this.src='https://www.pngmart.com/files/21/Account-User-PNG-Photo.png';" width="45"
                            >

                            <div class="d-flex flex-column flex-wrap ml-2" id="'.$id.'"><span class="font-weight-bold"><a href="<?= URL ?>/Usuario/<?= $pubComentario['id_usuario']?>"><?= $pubComentario['usuario']?></a></span><span class="text-black-50 time"><?= $ctl->trasnformDataEHora($pubComentario['dataPublicacao'])?></span></div>
                        </div>
                        <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                    </div>        
                    
                    <div class="p-2 px-3"><span><?= $pubComentario['texto']?></span></div>

                    <?php

                        if (isset($pubComentario['imagem']) && !empty($pubComentario['imagem'])){

                    ?>

                    <div class="feed-image p-2 px-3"><img class="img-fluid img-responsive" src="../images/post/<?= $pubComentario['imagem']?>"/></div>
                    
                    <?php 

                        } 

                    ?>

                </div>

                <div class="bg-white border mt-2">

                    <div id="publicacao" class="d-flex flex-row justify-content-between align-items-center p-2 bg-white border">
                        <form action="<?=URL?>/request/comentario" method="POST" enctype="multipart/form-data">   
                            <textarea name="textoComentario" id="texto" placeholder="Faça um comentário" cols="" rows="5"></textarea>
                            <input type="hidden" id="id-publicacao" name="id-publicacao" value="<?= $idPublicacao ?>">

                            <label></label>
                            <input type="submit" value="publicar" name="publicar">
                        </form>
                    </div>

                </div>

                <div><h3>Comentários</h3></div>

                <?php

                    foreach($comentario as $pub){

                ?>

                <div class="bg-white border mt-2">
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                        <div class="d-flex flex-row align-items-center feed-text px-2">
                            <img class="rounded-circle" src="../images/perfil/<?= $pub['img']?>" w
                                onerror="this.onerror=null;this.src='https://www.pngmart.com/files/21/Account-User-PNG-Photo.png';" width="45"
                            >
                            <div class="d-flex flex-column flex-wrap ml-2" id="'.$id.'"><span class="font-weight-bold"><a href="<?= URL ?>/Usuario/<?= $pub['id_usuario']?>"><?= $pub['usuario']?></a></span><span class="text-black-50 time"><?= $ctl->trasnformDataEHora($pub['dataComentario'])?></span></div>
                        </div>
                        <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                    </div>
        
                    <div class="p-2 px-3"><span><?= $pub['textoComentario']?></span></div>

                </div>

                <?php 

                    } 

                ?>

            </div>
        </div>
    </div>
</div>

