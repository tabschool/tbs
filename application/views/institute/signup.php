<main>

    <div class="custom-container">

        <div class="card white">

            <div class="card-content black-text">

                <span class="card-title">Register Institute</span>

                <form class="form-container" action="" method="post">

                    <div class="row">

                        <div class="input-field col s12 m6 l6">

                            <input id="username" name="username" type="text" value="<?php echo set_value('username'); ?>" class="validate">

                            <label for="username">Username</label>

                            <div class="error"><?php echo form_error('username'); ?></div>

                        </div>

                        <div class="input-field col s12 m6 l6">

                            <input id="phone" name="phone" type="text" value="<?php echo set_value('phone'); ?>" class="validate">

                            <label for="email">Phone</label>

                            <div class="error"><?php echo form_error('phone'); ?></div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="input-field col s12 m12 l12">

                            <input id="email" name="email" type="text" value="<?php echo set_value('email'); ?>" class="validate">

                            <label for="email">Eamil</label>

                            <div class="error"><?php echo form_error('email'); ?></div>

                        </div>

                    </div>


                    <div class="row">

                        <div class="input-field col s12 m6 l6">

                            <input id="password" name="password" type="password" value="<?php echo set_value('password'); ?>" class="validate">

                            <label for="password">Password</label>

                            <div class="error"><?php echo form_error('password'); ?></div>

                        </div>

                        <div class="input-field col s12 m6 l6">

                            <input id="conPassword" name="conPassword" type="password" class="validate">

                            <label for="conPassword">Confirm Password</label>

                            <div class="error"><?php echo form_error('conPassword'); ?></div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="input-field col s12 m12 l12">

                            <input id="institute_name" name="institute_name" type="text" value="<?php echo set_value('institute_name'); ?>" class="validate">

                            <label for="last_name">Institue Name</label>

                            <div class="error"><?php echo form_error('institute_name'); ?></div>

                        </div>

                    </div>

                    <div class="center-align">

                        <input type="submit" class=" btn btn-size blue " name="submit" value="Register">

                       
                    </div>

                </form>

            </div>

        </div>

    </div>

</main>