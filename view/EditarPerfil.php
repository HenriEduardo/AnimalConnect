<div class="wrapper">
    <div class="text-center mt-4 name">
        Edite seus dados
    </div>
    <form action="<?=URL?>/request/editarPerfil" method="POST" enctype="multipart/form-data" class="p-3 mt-3">
        <div class="text-center">
            <h5>Suas informações</h2>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="text" name="nome" id="nome" placeholder="Seu nome" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="date" name="dataNascimento" id="dataNascimento" placeholder="Data de nascimento" max="<?php echo date('Y-m-d'); ?>" onfocus="(this.type='date')" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="email" name="email" id="email" placeholder="email" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="senha" id="senha" placeholder="senha" required>
        </div>
        <div class="text-center">
            <h5>Informações do seu animal</h2>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="text" name="nomeAnimal" id="nomeAnimal" placeholder="Nome do seu animal" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="text" name="usuario" id="usuario" placeholder="@Usuário" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="date" name="dataNascimentoAnimal" id="dataNascimentoAnimal" placeholder="Nascimento do seu animal" max="<?php echo date('Y-m-d'); ?>" onfocus="(this.type='date')" required>
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="file" id="img-perfil" name="img-perfil" accept="image/*">
        </div>
        <input class="btn mt-3" type="submit" value="Salvar" name="salvar" id="salvar">
    </form>
    <div class="text-center fs-6">
        <a href="<?= URL ?>/Home">Voltar</a>
    </div>
</div>