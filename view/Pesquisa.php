<?php



?>

<div class="container mt-4 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="feed p-2">

                <?php

                    foreach($pesquisar as $pesquisa){

                ?>

                <div class="bg-white border mt-2">
                    <div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                            <div class="d-flex flex-row align-items-center feed-text px-2">
                                <img class="rounded-circle" src="./images/perfil/<?= $pesquisa['img']?>"
                                    onerror="this.onerror=null;this.src='https://www.pngmart.com/files/21/Account-User-PNG-Photo.png';" width="45" height="45"
                                >
                                <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold"><a href="<?= URL ?>/Usuario/<?= $pesquisa['id']?>"><?= $pesquisa['usuario']?></span></div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <?php 

                    } 

                ?>

            </div>
        </div>
    </div>
</div>

