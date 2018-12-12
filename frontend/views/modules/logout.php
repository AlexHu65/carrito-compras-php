<?php


session_destroy();

if(!empty($_SESSION['id_token_google'])){
    $client->revokeToken($_SESSION['id_token_google']);
    unset($_SESSION['id_token_google']);
}

echo '<script>

window.location = "' . $config['frontend'] . '"

</script>';

