<?php
include_once 'fragments/header.php';
include_once 'autoload.php';
$studentRepository = new StudentRepository();
$personnes = $studentRepository->findAll();

?>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Name</th>
        <th>Age</th>
        <th>Job</th>
        <th>Image</th>
    </tr>
    <?php foreach ($personnes as $personne) {

    ?>
    <tr>
        <td class="id id<?= $personne->id?>"><?= $personne->id?></td>
        <td class="firstname id<?= $personne->id?>"><?= $personne->firstname ?></td>
        <td class="lastname id<?= $personne->id?>"><?= $personne->lastname ?></td>
        <td class="age id<?= $personne->id?>"> <?= $personne->age ?></td>
        <td class="pro id<?= $personne->id?>"><?= $personne->profession ?></td>



        <td class="img id<?= $personne->id?>"><?php
            if(!is_null($personne->image)){
               ?>
                <img height="100px" width="100px" src="data:image/jpg;base64,<?=$personne->image?>">
                <?php
            }

            ?></td>

        <td>
            <form class="deletebtn" action="supprimer.php" method="POST">
                <input class="btn btn-dark" type="submit" value="Delete" name="<?= $personne->id?>">
            </form>
            <input class="btn btn-dark edit" type="submit" value="Edit" id="<?= $personne->id?>">
        </td>


    </tr>
    <?php

    }
    ?>

    <form action="edit.php" method="POST" enctype="multipart/form-data">

        <div  class="form">
            <div class="btn close">
                <i class="fas fa-times fa-3x"></i>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text edit" id="basic-addon1">ID</span>
                <input name="id" type="text" class="form-control edit" placeholder="ID" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Firstname</span>
                <input name="firstname" type="text" class="form-control firstname" placeholder="Slim" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Lastname</span>
                <input name="lastname" type="text" class="form-control lastname" placeholder="Hammami" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Age</span>
                <input name="age" type="text" class="form-control age" placeholder="21" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Profession</span>
                <input name="profession" type="text" class="form-control pro" placeholder="Battal" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            <div class="form-group image">
                <label for="exampleFormControlFile1">Choose your picture</label>
                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

                <input class="btn btn-dark" type="submit" value="submit">



        </div>

    </form>


</table>
    <input class="btn edit btn-outline-dark" type="submit" value="Ajouter" >
<style>
    .img{
        width:250px;
    }

    form{
        position:relative;
        display:inline-block;
    }
    .deletebtn{
        margin:0px;
        padding:0px;
    }
    .btn.close{
        margin-bottom:10px;

    }

    .form{
        position:fixed;
        left:-1500px;
        z-index:500;
        height:80vh;
        border-radius: 20px;
        width:80vw;
        background-color:indianred;
        transition:all 0.5s ease;
        padding:40px;

    }
    .form.form-group .form-control{
        position:static;
        display:block!important;

    }
    .form.visible{
        left:10%;
    }
    .form-group.image{
        display:flex;
        align-items: center;

    }
    .form .btn.btn-dark{

        margin-top:20px;
        position:absolute;
        right:30px;
    }
</style>
<script>
    var btn1=document.querySelectorAll(".btn.edit");
    btn1.forEach(function(btn){
            btn.addEventListener("click",function(){
            var id=btn.getAttribute("id");
            console.log(id);
            document.querySelector(".form").classList.add("visible");
            document.querySelector(".form-control.edit").setAttribute("value",id);
                var id2=document.querySelector(".table .id.id"+id).textContent;
            var firstname=document.querySelector(".table .firstname.id"+id).textContent;
            console.log(firstname);
            var lastname=document.querySelector(".table .lastname.id"+id).textContent;
            var age=document.querySelector(".table .age.id"+id).textContent;
            var pro=document.querySelector(".table .pro.id"+id).textContent;
                document.querySelector(".form-control.edit").setAttribute("value",id2);
            document.querySelector(".form-control.firstname").setAttribute("value",firstname);
            document.querySelector(".form-control.lastname").setAttribute("value",lastname);
            document.querySelector(".form-control.age").setAttribute("value",age);
            document.querySelector(".form-control.pro").setAttribute("value",pro);
        })
    })
    var btn2=document.querySelector(".btn.close");
    btn2.addEventListener("click",function(){
        document.querySelector(".form").classList.remove("visible");
    })




</script>
</body>
</html>