<div class="wrapper">
    <div class="logo">
        <img src="https://img.freepik.com/vetores-gratis/cao-bonito-enfiando-a-lingua-para-fora-ilustracao-do-icone-dos-desenhos-animados_138676-2709.jpg?w=826&t=st=1683319089~exp=1683319689~hmac=b644a5e89874e35967262edb2cffd5b66807a3bae991540e30be58786237f647"
        width="40px" height="40px">
    </div>
    <div class="text-center mt-4 name">
        Crie a sua conta
    </div>
    <form action="<?=URL?>/request/registrar" method="POST" enctype="multipart/form-data" class="p-3 mt-3">
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
        <input class="btn mt-3" type="submit" value="Criar conta" name="criarConta" id="criarConta">
    </form>
    <div class="text-center fs-6">
        <a href="./login.php">Voltar</a>
    </div>
</div>