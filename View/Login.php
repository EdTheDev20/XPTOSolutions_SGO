 <section class="vh-100">
   <div class="container-fluid">
     <div class="row">
       <div class="col-sm-6 text-black">

         <div class="px-5 ms-xl-4">
           <span class="h1 fw-bold mb-0"></span>
         </div>

         <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

           <form style="width: 23rem;" method="POST">

             <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar sessão</h3>

             <div class="form-outline mb-4">
               <input type="email" id="useremail" name="useremail" class="form-control form-control-lg" />
               <label class="form-label" for="useremail">Endereço de email</label>
             </div>

             
             <div class="form-outline mb-4">
               <input type="password" id="userpassword" name="userpassword" class="form-control form-control-lg is-valid" />
               <label class="form-label" for="userpassword">Palavra Passe</label>

             </div>

             <?php if (isset($_SESSION['errorflag'])) {
                if ($_SESSION['errorflag']) {

              ?>

                 <div id="validationServer03Feedback" class="invalid-feedback">
                   Please provide a valid city.
                 </div>

             <?php
                }
              } ?>

             <div class="pt-1 mb-4">
               <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
             </div>

             <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Esqueceu a sua password?</a></p>
             <p>Não possui uma conta? <a href="index.php?op=register" class="link-info">Registre-se já</a></p>

           </form>

         </div>

       </div>
       <div class="col-sm-6 px-0 d-none d-sm-block">
         <img src="./Content/yuksel-goz-K64q3XQsZk4-unsplash.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
       </div>
     </div>
   </div>
 </section>