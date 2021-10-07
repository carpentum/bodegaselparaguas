<?php


class BS_Forms_Builder {

    private $formTypes = array();

    //
    // __Init the
    //
    public function __construct() {

        //
        // Generate the Available Form Types
        //
        $this->formTypes = array(
            '1' => array(
                'type_name' => 'Text Field',
                'have_name' => true,
                'have_label' => true,
                'have_class' => true,
                'have_placeholder' => true,
                'have_required' => true,
                'have_options' => false
            ),
            '2' => array(
                'type_name' => 'Text Area',
                'have_name' => true,
                'have_label' => true,
                'have_class' => true,
                'have_placeholder' => true,
                'have_required' => true,
                'have_options' => false
            ),
            '3' => array(
                'type_name' => 'Dropdown',
                'have_name' => true,
                'have_label' => true,
                'have_class' => true,
                'have_placeholder' => false,
                'have_required' => true,
                'have_options' => true
            ),
            '4' => array(
                'type_name' => 'Number',
                'have_name' => true,
                'have_label' => true,
                'have_class' => true,
                'have_placeholder' => true,
                'have_required' => true,
                'have_options' => false
            ),
            '5' => array(
                'type_name' => 'Email Address',
                'have_name' => true,
                'have_label' => true,
                'have_class' => true,
                'have_placeholder' => true,
                'have_required' => true,
                'have_options' => false
            ),

            '99' => array(
                'type_name' => 'reCAPTCHA',
                'have_name' => true,
                'have_label' => false,
                'have_class' => false,
                'have_placeholder' => false,
                'have_required' => false,
                'have_options' => false
            )
        );
    }




    //
    // Generate Form Type
    //
    // @access public
    // @since 0.4.0
    // @return void
    //
    public function getInputType($type, $key, $d=array()) {
        global $wpdb;

        if (get_option('bsf_settings')) {
            $settings = get_option('bsf_settings');
            $settings = unserialize($settings);
        }

        // Set Label Name
        $label = ($d['data_label'] ? $d['data_label'] : '#nolabel');

        // Generate Column Size Options
        $columnData[0] = '<option value="0">Select a Column</option>';
        $columnData[1] = '<option value="0">Select a Column</option>';
        $columnData[2] = '<option value="0">Select a Column</option>';
        $columnData[3] = '<option value="0">Select a Column</option>';
        $columnData[4] = '<option value="0">Select a Column</option>';

        for($i = 1; $i < 13; $i++ ) {
            $columnData[0] .= '<option '.($i==$d['data_column_xs']?'selected':'').' value="'.$i.'">(col-'.$i.')</option>';
            $columnData[1] .= '<option '.($i==$d['data_column_sm']?'selected':'').' value="'.$i.'">(col-sm-'.$i.')</option>';
            $columnData[2] .= '<option '.($i==$d['data_column_md']?'selected':'').' value="'.$i.'">(col-md-'.$i.')</option>';
            $columnData[3] .= '<option '.($i==$d['data_column_lg']?'selected':'').' value="'.$i.'">(col-lg-'.$i.')</option>';
            $columnData[4] .= '<option '.($i==$d['data_column_xl']?'selected':'').' value="'.$i.'">(col-xl-'.$i.')</option>';
        }

        if ($settings['bootstrap']['version']==='4') {
            unset($columnData[4]);
        }

        ////////////////////////////
        ////// CONFIG OPTIONS //////
        ////////////////////////////
        $return = '<li class="box collapsed-box field_row row' . ($key) . '" data-index="' . ($key) . '" data-field="' . $d['data_id'] . '" data-type="' . $type . '">';

        $inputTitle = '';
        if (isset($d['data_name']) && $d['data_name']) {
            $inputTitle .= '(Name: ' . $d['data_name'] . ') ';
        }

        if (isset($d['data_label']) && $d['data_label']) {
            $inputTitle .= '(Label: ' . $d['data_label'] . ') ';
        }

        $return .= '<div class="box-header">
                        <div class="fright box-tools">
                        <button data-original-title="Collapse" type="button" class="btn btn-default btn-sm" data-widget="collapse">
                        <i class="dashicons dashicons-plus"></i></button>
                        <button data-original-title="Remove" type="button" class="btn btn-danger btn-sm" data-widget="remove">
                        <i class="dashicons dashicons-no"></i></button>
                        </div>
                        <div class="widget-title ui-sortable-handle"><h3>' . $this->formTypes[$type]['type_name'] . ' ' . ($inputTitle ? '' . $inputTitle . '' : '') . '<span class="in-widget-title"></span></h3></div>
                        </div>';

        $return .= '<div class="box-body" style="display: none;">';

        $return .= '<input type="hidden" value="' . $type . '" name="form[' . $key . '][data_type]">';

        $return .= '<div class="row">';


        // Column 8 (Main Content)
        $return .= '<div class="col-8">';

        $return .= '<h2>' . $this->formTypes[$type]['type_name'] . ' Options</h2>';

        // Name (Always Required)
        if ($this->formTypes[$type]['have_name']) {
            $return .= '<div class="box-highlight">';
            $return .= '<label for="form[' . $key . '][data_name]">Edit Name (Required)</label><input id="form[' . $key . '][data_name]" value="' . $d['data_name'] . '" class="form-control" placeholder="Input Name" name="form[' . $key . '][data_name]"><small>Required. Must not contain spaces e.g first_name</small>';
            $return .= '</div>';
        }

        // Label
        if ($this->formTypes[$type]['have_label']) {
            $return .= '<label for="form[' . $key . '][data_label]">Edit Label</label><input id="form[' . $key . '][data_label]" value="' . $d['data_label'] . '" class="form-control" placeholder="Input Label" name="form[' . $key . '][data_label]">';
        }

        // Class
        if ($this->formTypes[$type]['have_class']) {
            $return .= '<label for="form[' . $key . '][data_class]">Edit Class</label><input id="form[' . $key . '][data_class]" value="' . $d['data_class'] . '" class="form-control" placeholder="Input Class" name="form[' . $key . '][data_class]">';
        }

        // Placeholder
        if ($this->formTypes[$type]['have_placeholder']) {
            $return .= '<label for="form[' . $key . '][data_placeholder]">Edit Placeholder</label>';
            $return .= '<input id="form[' . $key . '][data_placeholder]" value="' . $d['data_placeholder'] . '" class="form-control" placeholder="Input Placeholder" name="form[' . $key . '][data_placeholder]">';
        }

        // Required
        if ($this->formTypes[$type]['have_required']) {
            $return .= '<label for="form[' . $key . '][data_req]"><input type="checkbox" id="form[' . $key . '][data_req]" value="1" ' . ($d['data_req'] == 1 ? 'checked' : '') . ' name="form[' . $key . '][data_req]"> Required</label>';
        }

        // Options e.g. Dropdowns, Radio
        if ($this->formTypes[$type]['have_options']) {

            if (is_array($d['options']) && $d['options']) {
                $options = $d['options'];
            } else {
                $options = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'bs_options` WHERE `data_id`=' . esc_sql($d['data_id']) . ' ORDER BY `data_id` DESC', ARRAY_A);
            }

            $return .= '<div class="optionapend box-highlight">';

            if (is_array($options)) {
                foreach ($options as $o) {
                    $return .= $this->generateOption($key, $o);
                }
            }

            $return .= '<div style="clear:both;"></div>';
            $return .= '</div>';

            $return .= '<button class="add_option btn btn-submit" type="button"><span class="dashicons dashicons-plus-alt"></span> Add Option</button>';

        }

        $return .= '</div>';


        // Column 4 (Sidebar)
        $return .= '<div class="col-4">';
        $return .= '<h2>Bootstrap Layout</h2>';
        $return .= $this->generateColumn($key, $columnData);
        $return .= '</div>';
        $return .= '</div>';

        $return .= '<div class="clear"></div>';

        $return .= '</div>';

        $return .= '</li>';

        // Return
        return $return;
    }


    public function generateColumn($input_id, $data) {

        $return = '<div class="box-highlight">';
        $return .= '<label for="form[' . $input_id . '][data_column_xs]">Choose Default Column (Required)</label>';
        $return .= '<select id="form[' . $input_id . '][data_column_xs]" class="form-control" name="form[' . $input_id . '][data_column_xs]">' . $data[0] . '</select>';
        $return .= '<small>Primary column that Bootstrap will fallback to</small>';
        $return .= '</div>';

        $return .= '<label for="form[' . $input_id . '][data_column_sm]">Small</label>';
        $return .= '<select id="form[' . $input_id . '][data_column_sm]" class="form-control" name="form[' . $input_id . '][data_column_sm]">' . $data[1] . '</select>';

        $return .= '<label for="form[' . $input_id . '][data_column_md]">Medium</label>';
        $return .= '<select id="form[' . $input_id . '][data_column_md]" class="form-control" name="form[' . $input_id . '][data_column_md]">' . $data[2] . '</select>';

        $return .= '<label for="form[' . $input_id . '][data_column_lg]">Large Size</label>';
        $return .= '<select id="form[' . $input_id . '][data_column_lg]" class="form-control" name="form[' . $input_id . '][data_column_lg]">' . $data[3] . '</select>';

        $return .= '<label for="form[' . $input_id . '][data_column_xl]">Extra Large</label>';
        $return .= '<select id="form[' . $input_id . '][data_column_xl]" class="form-control" name="form[' . $input_id . '][data_column_xl]">' . $data[4] . '</select>';

        return $return;
    }

    public function generateOption($input_id, $o=array()) {

        $return = '<div class="panel">';

        $return .= '<button type="button" class="btn btn-default btn-sm remove_option fright"><i class="dashicons dashicons-no"></i></button>';

        $return .= '<h2 class="panel-title">Dropdown Option</h2>';

        $return .= '<div class="row" style="clear:both;">';

        $return .= '<div class="col-6">';
        $return .= '<label>Dropdown Name</label>';
        $return .= '<input class="bsf_input" type="text" placeholder="Please enter a option name..." name="form['.$input_id.'][optionname][]" value="' . $o['option_text'] . '">';
        $return .= '</div>';

        $return .= '<div class="col-6">';
        $return .= '<label>Dropdown Value</label>';
        $return .= '<input class="bsf_input" type="text" placeholder="Please enter a option value..." name="form['.$input_id.'][optionvalue][]" value="' . $o['option_value'] . '">';
        $return .= '</div>';

        $return .= '<div style="clear:both;"></div>';

        $return .= '</div>';

        $return .= '<div style="clear:both;"></div>';

        $return .= '</div>';

        $return .= '<div style="clear:both;"></div>';



        return $return;
    }

}