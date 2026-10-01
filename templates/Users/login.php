<section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="index.html">EJ</a>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Sign in</strong>
        </header>
        <!--form action="index.html" class="panel-body wrapper-lg"-->
        <?= $this->Flash->render() ?>
        <?= $this->Form->create(null, ["class"=>"panel-body wrapper-lg"]); ?>    
          <div class="form-group">
            
            <!--input type="email" placeholder="test@example.com" class="form-control input-lg"-->
            <?= $this->Form->control('email', ['required' => true, "placeholder"=>"test@example.com", "class" => "form-control input-lg", "id" => "username", "autocomplete" => "off"]) ?>
          </div>
          <div class="form-group">
            
            <!--input type="password" id="inputPassword" placeholder="Password" class="form-control input-lg"-->
            <?= $this->Form->control('password', ['required' => true,"placeholder"=>"Password", "class" => "form-control input-lg", "id" => "password", "autocomplete" => "off"]) ?>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Keep me logged in
            </label>
          </div>
          <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a>
          <!--button type="submit" class="btn btn-primary">Sign in</button-->
          <?= $this->Form->submit('Sign in', array("class" => "btn btn-primary")); ?>

         
          <div class="line line-dashed"></div>
          <?php /* ?><a href="#" class="btn btn-facebook btn-block m-b-sm"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
          <a href="#" class="btn btn-twitter btn-block"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>
          <div class="line line-dashed"></div><?php */ ?>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
          <a href="<?=WEBROOT?>users/register" class="btn btn-default btn-block">Create an account</a>
          <?= $this->Form->end() ?>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>&copy; 2024</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->