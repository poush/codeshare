      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li {{ ('admin' == Request::path())?'class="active"':'' }}><a href="../admin">Home</a></li>
          <li {{ ('admin/settings' == Request::path())?'class="active"':'' }}><a href="../admin/settings"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
          <li {{ ('admin/profile' == Request::path())?'class="active"':'' }}><a href="../admin/profile">Admin Profile</a></li>
          <li {{ ('admin/local' == Request::path())?'class="active"':'' }}><a href="../admin/local">Localization</a></li>
          <li {{ ('admin/snippetslist' == Request::path())?'class="active"':'' }}><a href="../admin/snippetslist">Snippets</a></li>
          <li><a href="../" target="_blank">Website</a></li>

          <li ><a href="../logout?adminred=admin">Log Out</a></li>
        </ul>
        <h3 class="text-muted">{{ Config::get('settings.SiteName') }} | Admin Panel</h3>
      </div>
