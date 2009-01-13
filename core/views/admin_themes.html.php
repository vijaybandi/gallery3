<?php defined("SYSPATH") or die("No direct script access.") ?>
<script type="text/javascript">
  var select_url = "<?= url::site("admin/themes/choose") ?>";
  select = function(type, id) {
    $.post(select_url, {"type": type, "id": id, "csrf": '<?= access::csrf_token() ?>'},
      function() { load(type) });
  }
</script>

<div id="gAdminThemes">
  <h1> <?= t("Theme Administration") ?> </h1>
  <p>
    <?= t("Gallery allows you to choose a theme for your site, as well as a theme for the administration interface.  Click a theme to preview and activate it.") ?>
  </p>

  <div id="gSiteTheme">
    <h2> <?= t("Site theme") ?> </h2>
    <div class="gBlock selected">
      <img src="<?= url::file("themes/{$site}/thumbnail.png") ?>"
           alt="<?= $themes[$active]->name ?>" />
      <h3> <?= $themes[$site]->name ?> </h3>
      <p>
        <?= $themes[$site]->description ?>
      </p>
    </div>

    <h2> <?= t("Available site themes") ?> </h2>
    <div id="gAvailableSiteThemes">
      <? foreach ($themes as $id => $info): ?>
      <? if (!$info->site) continue ?>
      <? if ($id == $site) continue ?>
      <div class="gBlock">
        <a href="<?= url::site("admin/themes/preview/site/$id") ?>" class="gDialogLink" title="<?= t("Theme Preview: {{theme_name}}", array("theme_name" => $info->name)) ?>">
          <img src="<?= url::file("themes/{$id}/thumbnail.png") ?>"
               alt="<?= $info->name ?>" />
          <h3> <?= $info->name ?> </h3>
          <p>
            <?= $info->description ?>
          </p>
        </a>
      </div>
      <? endforeach ?>
    </div>
  </div>

  <div id="gAdminTheme">
    <h2> <?= t("Admin theme") ?> </h2>
    <div class="gBlock selected">
      <img src="<?= url::file("themes/{$admin}/thumbnail.png") ?>"
           alt="<?= $themes[$admin]->name ?>" />
      <h3> <?= $themes[$admin]->name ?> </h3>
      <p>
        <?= $themes[$admin]->description ?>
      </p>
    </div>

    <h2> <?= t("Available admin themes") ?> </h2>
    <div id="gAvailableAdminThemes">
      <? foreach ($themes as $id => $info): ?>
      <? if (!$info->admin) continue ?>
      <? if ($id == $admin) continue ?>
      <div class="gBlock">
        <a href="<?= url::site("admin/themes/preview/admin/$id") ?>" class="gDialogLink" title="<?= t("Theme Preview: {{theme_name}}", array("theme_name" => $info->name)) ?>">
          <img src="<?= url::file("themes/{$id}/thumbnail.png") ?>"
               alt="<?= $info->name ?>" />
          <h3> <?= $info->name ?> </h3>
          <p>
            <?= $info->description ?>
          </p>
        </a>
      </div>
      <? endforeach ?>
    </div>
  </div>
</div>
