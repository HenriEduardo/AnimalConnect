<?php



?>

<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="feed p-2">
              
                <div id="publicacao" class="d-flex flex-row justify-content-between align-items-center p-2 bg-white border">
                    <form action="<?=URL?>/request/post" method="POST" enctype="multipart/form-data">   
                        <textarea name="texto" id="texto" placeholder="Faça uma publicação" cols="" rows="5"></textarea>
                        <input type="file" id="file-upload" name="file-upload" accept="image/*">
                        <label for="file-upload">
                            <img src="https://cdn-icons-png.flaticon.com/512/12/12656.png" width="40px" height="40px" alt="">
                        </label>
                        <input type="submit" value="publicar" name="publicar">
                    </form>
                </div>

                <?php

                    foreach($post as $pub){

                ?>

                <div class="bg-white border mt-2">
                    <div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                            <div class="d-flex flex-row align-items-center feed-text px-2">
                                <img class="rounded-circle" src="./images/perfil/<?= $pub['img']?>"
                                    onerror="this.onerror=null;this.src='https://www.pngmart.com/files/21/Account-User-PNG-Photo.png';" width="45" height="45"
                                >
                                <div class="d-flex flex-column flex-wrap ml-2" id="'.$id.'"><span class="font-weight-bold"><a href="<?= URL ?>/Usuario/<?= $pub['id_usuario']?>"><?= $pub['usuario']?></a></span><span class="text-black-50 time"><?= $ctl->trasnformDataEHora($pub['dataPublicacao'])?></span></div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="p-2 px-3"><span><?= $pub['texto']?></span></div>
                    <?php

                        if (isset($pub['imagem']) && !empty($pub['imagem'])){

                    ?>

                    <div class="feed-image p-2 px-3"><img class="img-fluid img-responsive" src="./images/post/<?= $pub['imagem']?>"/></div>
                    
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

