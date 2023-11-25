<div class="wrapper">
    <div class="logo">
        <img src="https://img.freepik.com/vetores-gratis/cao-bonito-enfiando-a-lingua-para-fora-ilustracao-do-icone-dos-desenhos-animados_138676-2709.jpg?w=826&t=st=1683319089~exp=1683319689~hmac=b644a5e89874e35967262edb2cffd5b66807a3bae991540e30be58786237f647"
        width="40px" height="40px">
    </div>
    <div style="text-align: center;" class="text-center mt-4 name">
        AnimalConnect
    </div>
    <form action="<?=URL?>/request/verifica" method="POST" class="p-3 mt-3">
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-user"></span>
            <input type="text" name="usuario" id="usuario" placeholder="@Usuário">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="senha" id="senha" placeholder="senha">
        </div>
        <div class="text-center fs-6 align-items-center">
            <input class="btn mt-3" style="text-align: center" type="submit" value="Entrar" name="entrar" id="entrar">
        </div>
    </form>
    <br><br><br>
    <div style="text-align: center;" class="text-center fs-6">
        <a href="Registrar">Criar conta</a>
    </div>
</div>