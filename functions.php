<?php 

function dump(array $var): void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function checkbox(string $name, string $value, array $data):string
{
    $checked = '';
    if (isset($data[$name]) && in_array($value, $data[$name])) {
        $checked .= 'checked';
    }
    return <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value" $checked>
HTML;
}

function radio(string $name, string $value, $data): string
{
    $checked = (isset($data[$name]) && $data[$name] === $value) ? 'checked' : '';

    return <<<HTML
        <input type="radio" name="$name" value="$value" $checked>
HTML;
}

function select(string $name, int $value, array $data): string 
{
    $html_options = [];
    foreach($data as $k => $jour) {
        $selected = ($value === $k) ? 'selected' : '';
        $html_options[] = "<option value='$k' $selected>$jour</options>";
    }   
    return "<select name='$name' class='form-control'>".implode($html_options)."</select>";
}

function is_active(string $page): string
{
    $active = '';
    if($_SERVER['SCRIPT_NAME'] === '/Mytest/'. $page.'.php') 
        $active = 'active';
    return $active;
}


function creneaux_html(array $creneaux): string
{
    if (empty($creneaux)) {
        return 'Fermé';
    }
    $display =[];
    foreach($creneaux as $creneau) {
        $display[] = "<strong>${creneau[0]}h</strong> / <strong>${creneau[1]}h</strong>";
    }
    return 'Ouvert '.implode(' & ', $display);
}

function in_creneaux(int $time, array $creneaux): bool
{
    $true = false;
    foreach($creneaux as $creneau) {
        if ($creneau[0] <= $time && $creneau[1] > $time) {
            $true = true;
        }
    }

    return $true;
}