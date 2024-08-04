<?php
function Named_Text($jsonNL, $TextFile) {
    // Read the JSON name list
    $json_fa = file_get_contents("{$jsonNL}");
    $NL = json_decode($json_fa, true);
    $NLNames = [];
    foreach ($NL as $name) {
        $NLNames[$name[1]] = $name[0];
    }
    // Read the original text
    $text_after_translate = file_get_contents("{$TextFile}");

    // Replace index placeholders with corresponding values
    $pattern = '/\[(\d+)\]/';
    $updated_text = preg_replace_callback($pattern, function ($matches) use ($NLNames) {
        $index = intval($matches[1]);
        if (isset($NLNames[$index])) {
            return "[" . $NLNames[$index] . "]";
        } else {
            return $matches[0]; // Keep the original match
        }
    }, $text_after_translate);

    // Add <br> tags for line breaks
    $updated_text = str_replace("\n", "<br>", $updated_text);

    // Save the modified text to a file
    file_put_contents("{$TextFile}", $updated_text);
    // echo $updated_text;
}