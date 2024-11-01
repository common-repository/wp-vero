<?php
  if ($_POST['wpvero_hidden'] == 'Y') {
    $api_key = $_POST['wpvero_api_key'];
    update_option('wpvero_api_key', $api_key);

    $ignore_user = $_POST['wpvero_ignore_user'];
    update_option('wpvero_ignore_user', $ignore_user);

    $track_posts = $_POST['wpvero_track_posts'];
    update_option('wpvero_track_posts', $track_posts);

    $track_pages = $_POST['wpvero_track_pages'];
    update_option('wpvero_track_pages', $track_pages);

    $track_searches = $_POST['wpvero_track_searches'];
    update_option('wpvero_track_searches', $track_searches);
    ?>
    <div class="updated"><p><strong>Settings saved.</strong></p></div>
    <?php
  } else {
    $api_key = get_option('wpvero_api_key');
    $ignore_user = get_option('wpvero_ignore_user', 11);
    $track_posts = get_option('wpvero_track_posts', true);
    $track_pages = get_option('wpvero_track_pages', true);
    $track_searches = get_option('wpvero_track_searches', true);
  }
?>

<div class="wrap">
  <?php echo "<h2>Vero settings</h2>"; ?>

  <form name="wpvero_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <input type="hidden" name="wpvero_hidden" value="Y">
    <table class='form-table'>
      <tbody>
        <tr valign="top">
          <th>
            <label for="wpvero_api_key">Enter your Vero API key: </label>
          </th>
          <td>
            <input type="text" name="wpvero_api_key" value="<?php echo $api_key; ?>" size="38">
            <p class='description'>
              You can find your Vero API under the <a target='_blank' href="https://app.getvero.com/account/api_keys">account section</a>
            </p>
          </td>
        </tr>
      </tbody>
    </table>
    <h3>Advanced settings</h3>
    <p>These advance settings are what we recommend you to use. Most of the time you shouldn't need to change them:</p>
    <table class='form-table'>
      <tbody>
        <tr valign="top">
          <th>
            <label for="wpvero_ignore_user">Which user to ignore: </label>
          </th>
          <td>
            <select class="select" name="wpvero_ignore_user" id="wpvero_ignore_user">
              <option value="11" <?php if ($ignore_user == 11) echo 'selected="selected"'; ?>>No One</option>
              <option value="8" <?php if ($ignore_user == 8) echo 'selected="selected"'; ?>>Administrators and Up</option>
              <option value="5" <?php if ($ignore_user == 5) echo 'selected="selected"'; ?>>Editors and Up</option>
              <option value="2" <?php if ($ignore_user == 2) echo 'selected="selected"'; ?>>Authors and Up</option>
              <option value="1" <?php if ($ignore_user == 1) echo 'selected="selected"'; ?>>Contributors and Up</option>
              <option value="0" <?php if ($ignore_user == 0) echo 'selected="selected"'; ?>>Everyone!</option>
            </select>
            <p class="description">
              Users with the selected role and higher will be ignored.
            </p>
          </td>
        </tr>
        <tr valign="top">
          <th>
            <label for="wpvero_track_posts">Track posts: </label>
          </th>
          <td>
            <input type="checkbox" name="wpvero_track_posts" value="1" <?php if ($track_posts) { echo 'checked="checked"'; } ?>>
            Automatically track events when a user view a post.
            <p class="description">
              These will track a "View post".
            </p>
          </td>
        </tr>
        <tr valign="top">
          <th>
            <label for="wpvero_track_pages">Track pages: </label>
          </th>
          <td>
            <input type="checkbox" name="wpvero_track_pages" value="1" <?php if ($track_pages) { echo 'checked="checked"'; } ?>>
            Automatically track events when a user view a page.
            <p class="description">
              These will track a "View Home page" or "View About page".
            </p>
          </td>
        </tr>
        <tr valign="top">
          <th>
            <label for="wpvero_track_searches">Track searches: </label>
          </th>
          <td>
            <input type="checkbox" name="wpvero_track_searches" value="1" <?php if ($track_searches) { echo 'checked="checked"'; } ?>>
            Automatically track events when a user view the search result page.
            <p class="description">
              These will track a "View search page" event with a "query" property.
            </p>
          </td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <input type="submit" name="Submit" value="Update settings" class='button button-primary' />
    </p>
  </form>
</div>