<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url()?>"><?php echo $this->lang->line('system_system_name'); ?></a>
            <div class="navbar-brand navbar-brand-centered">  -  &nbsp;Forest Hills Residencial</div>
        </div>
        <center>
            <div class="navbar-collapse collapse" id="navbar-main">
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="<?php echo $this->lang->line('top_nav_login_email'); ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="<?php echo $this->lang->line('top_nav_login_password'); ?>">
                    </div>
                    <button type="submit" class="btn btn-default"><?php echo $this->lang->line('top_nav_login'); ?></button>
                </form>
            </div>
        </center>
    </div>
</div>