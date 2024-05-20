<?php

add_action('admin_menu', 'whats_icon_menu');

function whats_icon_menu()
{
  add_menu_page('Whats Icon', 'Whats Icon', 'manage_options', 'whats-icon', 'whats_icon_menu_pagina', 'dashicons-whatsapp', -1);
}

function whats_icon_menu_pagina()
{
  ?>
  <div>

    <h1>
      Whats Icon
    </h1>

    <form action="options.php" method="post">
      <?php
      settings_errors();
      do_settings_sections('whats-icon');
      settings_fields('whats_icon_settings');
      submit_button();
      ?>
    </form>
  </div>
  <?php
}

add_action('admin_menu', 'whats_icon_secao');

function whats_icon_secao()
{
  add_settings_section(
    'whats_icon_secao',
    'Configurações para o botão do whats',
    'whats_icon_campos_secao_detalhes',
    'whats-icon'
  );

  add_settings_field(
    'whats_icon_ddi',
    'DDI - Selecione um pais:',
    'whats_icon_ddi',
    'whats-icon',
    'whats_icon_secao'
  );
  register_setting(
    'whats_icon_settings',
    'whats_icon_ddi',
  );

  add_settings_field(
    'whats_icon_ddd',
    'DDD - Selecione uma cidade:',
    'whats_icon_ddd',
    'whats-icon',
    'whats_icon_secao'
  );
  register_setting(
    'whats_icon_settings',
    'whats_icon_ddd',
  );

  add_settings_field(
    'whats_icon_number',
    'Número de telefone:',
    'whats_icon_number',
    'whats-icon',
    'whats_icon_secao'
  );
  register_setting(
    'whats_icon_settings',
    'whats_icon_number',
    'check_number'
  );

  add_settings_field(
    'whats_icon_text',
    'Texto a ser enviado:',
    'whats_icon_text',
    'whats-icon',
    'whats_icon_secao'
  );
  register_setting(
    'whats_icon_settings',
    'whats_icon_text'
  );

  add_settings_field(
    'whats_icon_position',
    'Alinhar icone a:',
    'whats_icon_position',
    'whats-icon',
    'whats_icon_secao'
  );
  register_setting(
    'whats_icon_settings',
    'whats_icon_position'
  );

  add_settings_field(
    'whats_icon_bottom_px',
    'Distância do rodapé:',
    'whats_icon_bottom_px',
    'whats-icon',
    'whats_icon_secao'
  );
  register_setting(
    'whats_icon_settings',
    'whats_icon_bottom_px'
  );

  add_settings_field(
    'whats_icon_side_px',
    'Distância da lateral:',
    'whats_icon_side_px',
    'whats-icon',
    'whats_icon_secao'
  );
  register_setting(
    'whats_icon_settings',
    'whats_icon_side_px'
  );

}

function whats_icon_campos_secao_detalhes()
{
  ?>
  <p>Insira aqui as informações:</p>
  <?php
}

function whats_icon_ddi()
{
  $arquivo_json = plugin_dir_path(__FILE__) . 'json/paises.json';
  $json_data = file_get_contents($arquivo_json);
  $data = json_decode($json_data, true);

  if ($data !== null) {

    ?>
    <select name="whats_icon_ddi" id="whats_icon_ddi" value="<?php echo esc_attr(get_option('whats_icon_ddi')) ?>">
      <option selected>Selecione um pais</option>
      <?php
      foreach ($data as $item) {
        $flag = $item['img'];
        $pais = $item['pais'];
        $ddi = $item['ddi'];
        ?>
        <option value="<?php echo $ddi ?>" data-country="<?php echo $pais ?>" <?php echo esc_attr(get_option('whats_icon_ddi')) == $ddi ? 'selected' : '' ?>>
          <?php echo $pais . ' (+' . $ddi . ')' ?>
        </option>
        <?php
      }

      ?>
    </select>
    <?php
  } else {
    echo 'Erro ao carregar ou decodificar o JSON.';
  }

}

if (esc_attr(get_option('whats_icon_ddi')) == 55) {
  function whats_icon_ddd()
  {
    $arquivo_json = plugin_dir_path(__FILE__) . 'json/cidades.json';
    $json_data = file_get_contents($arquivo_json);
    $data = json_decode($json_data, true);

    if ($data !== null) {

      ?>
      <select name="whats_icon_ddd" id="whats_icon_ddd" value="<?php echo esc_attr(get_option('whats_icon_ddd')) ?>">
        <option selected>Selecione uma cidade</option>
        <?php

        foreach ($data as $item) {
          $pais = $item['pais'];
          $estado = $item['estado'];
          $cidade = $item['cidade'];
          $ddd = $item['ddd'];
          ?>
          <option value="<?php echo $ddd ?>" <?php echo esc_attr(get_option('whats_icon_ddd')) == $ddd ? 'selected' : '' ?>>
            <?php echo $cidade . ' (' . $ddd . ')' ?>
          </option>
          <?php
        }

        ?>
      </select>
      <?php
    } else {
      echo 'Erro ao carregar ou decodificar o JSON.';
    }

  }
} else {
  function whats_icon_ddd()
  {
    ?>
    <p style="color:red; font-weight:700;">Não possuimos os DDD's do pais selecionado, insira-o abaixo:</p>
      <input type="text" name="whats_icon_ddd" id="whats_icon_ddd"
    value="<?php echo (esc_attr(get_option('whats_icon_ddd'))); ?>"/>
    <?php
  }
}


function whats_icon_number()
{
  ?>
  <input type="tel" name="whats_icon_number" id="whats_icon_number"
    value="<?php echo (esc_attr(get_option('whats_icon_number'))); ?>" required>

  <?php
}

function whats_icon_text()
{
  ?>
  <input type="text" name="whats_icon_text" id="whats_icon_text"
    value="<?php echo (esc_attr(get_option('whats_icon_text'))); ?>" />
  <?php
}

function whats_icon_position()
{
  ?>
  <input type="radio" id="whats_icon_position_left" name="whats_icon_position" value="left" <?php echo get_option('whats_icon_position') == 'left' ? 'checked' : ''; ?> />
  <label for="whats_icon_position_left" style="margin-right: 10px;">Esquerda</label>
  <input type="radio" id="whats_icon_position_right" name="whats_icon_position" value="right" <?php echo get_option('whats_icon_position') == 'right' ? 'checked' : ''; ?> />
  <label for="whats_icon_position_right">Direita</label>

  <?php
}

function whats_icon_bottom_px()
{
  ?>

  <input type="number" name="whats_icon_bottom_px" id="whats_icon_bottom_px"
    value="<?php echo (esc_attr(get_option('whats_icon_bottom_px'))); ?>" min="10" max="100" />

  <?php
}

function whats_icon_side_px()
{
  ?>

  <input type="number" name="whats_icon_side_px" id="whats_icon_side_px"
    value="<?php echo (esc_attr(get_option('whats_icon_side_px'))); ?>" min="10" max="100" />

  <?php
}

function check_number($number)
{
  if (empty($number)) {
    $number = get_option('whats_icon_number');
    add_settings_error(
      'whats_icon_erro',
      'whats_icon_erro_number',
      'O campo telefone não pode ser vazio!',
      'error'
    );
  } else {
    $number = str_replace(array('-', ' '), '', $number);
  }
  return $number;
}

?>