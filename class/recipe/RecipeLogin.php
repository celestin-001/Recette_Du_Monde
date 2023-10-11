<?php

namespace recipe;

    class RecipeLogin
    {

        private $username="kitchen";
        private $password="showsummer";

        /**
         * generation du formulaire de login qui permet de se connecter en mode administrateur
         * @param $message
         * @return void
         */
        public function generateLogin($message=null){?>
            <div id="form01">
                <form id="form-control01" method="post" enctype="multipart/form-data">
                    <legend> Please Login</legend>
                    <div class="form-group01">
                        <input type="text" class="input-form" placeholder="Username..." name="user" value="">
                        <input type="password" class="input-form" placeholder="Password..." name="pwd" value="">
                        <button class="btn01 input-form" type="submit" >login</button>
                    </div>
                    <legend id="message" style="color: red"></legend>
                    <legend style="color: red"> <?= $message ?></legend>
                </form>
                <script src="<?php echo $GLOBALS['JS_DIR']?>login.js"></script>
            </div>

        <?php }

        /** verification du client s'il est bien logger
         * @param $user
         * @param $pwd
         * @return array
         */
        public function checkLogin($user, $pwd):array{
            $tab = [
                'access'=>false,
                'username'=>null,
                'error'=>null
            ];
            if(empty($user)){
                $tab['error'] ="user is empty";
            } else if(empty($pwd)){
                $tab['error'] ="password is empty";
            }
            else if($user == $this->username && $pwd == $this->password){
                $tab['access'] =true;
                $tab['username'] ="Kitchen";
            }
            else {
                $tab['error'] ="authentification failed";
            }
            return $tab;
        }
         
    }
