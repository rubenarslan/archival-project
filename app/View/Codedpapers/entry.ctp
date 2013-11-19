<style>
    #static-sidebar {
        position:fixed;
    }
    #outline li.active > a {
        font-weight:bold;
    }
    #outline ol {
        margin-bottom:0;
    }
    #outline li li {
        padding-left:10px;
    }
    #coding-form header {
        margin-top:0;
        padding: 0 20px;
    }
    #coding-form header h3 {
        margin-top:0px;
        line-height: 30px;
    }

    #coding-form header button {
        float:right;
    }
    #coding-form .study {
        padding:20px 0;
        background-color: #eee;
        border-left:5px solid #f89406;
    }
    #coding-form .test {
        border-top: 1px solid #bbb;
        padding:20px 0;
    }
    #coding-form .studyFooter,
    #coding-form .testFooter {
        padding:20px 0;
        background-color:#ddd;
        border-left:5px solid blue;
    }
    #coding-form .studyFooter .buttons,
    #coding-form .testFooter .buttons {
        text-align:right;
        padding-right:20px;
    }

    #coding-form .control-group {
        padding-left:10px;
        padding-right:10px;
    }
    #coding-form .controls {
        position:relative;
    }
    #coding-form .helpModalToggle {
        margin-top:5px;
    }
    .hide {
        display: none;
    }

    kbd {
        padding: 2px 4px;
        color: #f89406;
        white-space: nowrap;
        background-color: #f7f7f9;
        border: 1px solid #e1e1e8;
        border-radius:3px;
        font-size:12px;
    }


</style>
<div class='span4' id='static-sidebar'>
    <ol id='outline' class='nav'>
    </ol>
</div>
<div class='span8 offset4' id='coding-form'><!-- Offset is required because the sidebar is fixed. -->
    <?php
        echo $this->Form->create(
            'Codedpaper',
            array('class' => 'form-horizontal')
        );
    ?>
    <?php
        echo $this->Form->hidden("Paper.id");
        echo $this->Form->hidden("Paper.DOI");
        echo $this->Form->hidden("Codedpaper.id");
        echo $this->Form->hidden("Codedpaper.paper_id");
    ?>
    <?php
        for($i=0; $i<sizeof($this->data['Study']); $i++) {
            echo $this->element('partials/study', array(
                'i' => $i,
                'data' => $this->data
            ));
        }
    ?>
        <div class='studyFooter'>
            <div class='buttons'>
                <a class='btn btn-primary'>Add Study</a>
            </div>
        </div>
        <div class='formFooter'>
            <div class='buttons'>
                <input type='submit' class='btn btn-success' />
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
</div><!-- #coding-form -->
<script>
    function fromArgs(v, default_value) {
        return v === undefined ? (default_value==undefined ? "" : default_value) : v
    }

    function Test(args) {
        args = args===undefined ? {} : args;
        var Test = {
            "N_total": fromArgs(args['N_total']),
            "N_used_in_analysis": fromArgs(args['N_user_in_analysis']),
            "certainty_hypothesis": fromArgs(args['certainty_hypothesis']),
            "certainty_hypothesis_supported": fromArgs(args['certainty_hypothesis_supported']),
            "certainty_meth_var": fromArgs(args['certainty_meth_var']),
            "certainty_statistics": fromArgs(args['certainty_statistics']),
            "comment": fromArgs(args['comment']),
            "computed_significance_of_test": fromArgs(args['computed_significance_of_test'], null),
            "data_points_excluded": fromArgs(args['data_points_excluded']),
            "degrees_of_freedom": fromArgs(args['degrees_of_freedom']),
            "dependent_variables": fromArgs(args['dependent_variables']),
            "hypothesis_supported": fromArgs(args['hypothesis_supported']),
            "hypothesized": fromArgs(args['hypothesized']),
            "id": fromArgs(args['id']),
            "independent_variables": fromArgs(args['independent_variables']),
            "inferential_test_statistic": fromArgs(args['inferential_test_statistic']),
            "inferential_test_statistic_value": fromArgs(args['inferential_test_statistic_value'], null),
            "methodology_codes": fromArgs(args['methodology_codes']),
            "name": fromArgs(args['name']),
            "other_variables": fromArgs(args['other_variables']),
            "prior_hypothesis": fromArgs(args['prior_hypothesis']),
            "prior_hypothesis_page": fromArgs(args['prior_hypothesis_page']),
            "reasons_for_exclusions": fromArgs(args['reasons_for_exclusions']),
            "reported_effect_size_statistic": fromArgs(args['reported_effect_size_statistic']),
            "reported_effect_size_statistic_value": fromArgs(args['reported_effect_size_statistic_value'], null),
            "reported_significance_of_test": fromArgs(args['reported_significance_of_test']),
            "subsample": fromArgs(args['subsample']),
            "type_of_statistical_test_used": fromArgs(args['type_of_statistical_test_used'])
        }

        return Test;
    };

    var studies = <?php
        $studies = array();
        foreach($this->data['Study'] as $s){
            $tests = array();
            foreach($s['Test'] as $t){
                $tests[] = array(
                    'name' => $t['name'],
                    'id' => $t['id'],
                    #'effect_id' => $t['effect_id'],
                    'hypothesized' => $t['hypothesized'],
                    'prior_hypothesis' => $t['prior_hypothesis'],
                    'prior_hypothesis_page' => $t['prior_hypothesis_page'],
                    'subsample' => $t['subsample'],
                    #'analytic_design_cod' => $t['analytic_design_cod'],
                    'methodology_codes' => $t['methodology_codes'],
                    'independent_variables' => $t['independent_variables'],
                    'dependent_variables' => $t['dependent_variables'],
                    'other_variables' => $t['other_variables'],
                    'N_total' => $t['N_total'],
                    'data_points_excluded' => $t['data_points_excluded'],
                    'N_used_in_analysis' => $t['N_used_in_analysis'],
                    'reasons_for_exclusions' => $t['reasons_for_exclusions'],
                    'type_of_statistical_test_used' => $t['type_of_statistical_test_used'],
                    'reported_effect_size_statistic' => $t['reported_effect_size_statistic'],
                    'reported_effect_size_statistic_value' => $t['reported_effect_size_statistic_value'],
                    'inferential_test_statistic' => $t['inferential_test_statistic'],
                    'degrees_of_freedom' => $t['degrees_of_freedom'],
                    'inferential_test_statistic_value' => $t['inferential_test_statistic_value'],
                    'reported_significance_of_test' => $t['reported_significance_of_test'],
                    'computed_significance_of_test' => $t['computed_significance_of_test'],
                    'hypothesis_supported' => $t['hypothesis_supported'],
                    'certainty_hypothesis' => $t['certainty_hypothesis'],
                    'certainty_meth_var' => $t['certainty_meth_var'],
                    'certainty_statistics' => $t['certainty_statistics'],
                    'certainty_hypothesis_supported' => $t['certainty_hypothesis_supported'],
                    'comment' => $t['comment']
                );
            }
            $studies[] = array(
                'id' => $s['id'],
                'name' => $s['name'],
                'codedpaper_id' => $s['codedpaper_id'],
                'replication' => $s['replication'],
                'replication_code' => $s['replication_code'],
                'replicates_study_id' => $s['replicates_study_id'],
                'replication_freetext' => $s['replication_freetext'],
                'replication_freetext_study' => $s['replication_freetext_study'],
                'certainty_key_effect_tests' => $s['certainty_key_effect_tests'],
                'certainty_replication_status' => $s['certainty_replication_status'],
                'study_comment' => $s['study_comment'],
                'tests' => $tests
            );
        }
        echo json_encode($studies); ?>

    var paper = <?php
        $p = $this->data['Paper'];
        echo json_encode(array(
            'id' => $p['id'],
            'DOI' => $p['DOI']
        )); ?>




$(function() {

    /* show/hide is-replication div based on form value */
    $('.is-replication').on('change', function(e) {
        t = $(e.target).closest('.study').find('.replication-fields')
        $(e.target).val() == 'Replication' ? t.slideDown() : t.slideUp();
    }).trigger('change');

    var initSections = function() {

        $('.study').find('input, select, textarea').popover({
            /* field hovers */
            'trigger': 'hover',
            'html': true,
            'content': function() {
                return $('.control-group:hover .help-popover').html();
            }
        });

        $('.helpModalToggle').one('click', function(e) {
            /* "Detailed Help" buttons */
            modal = $(e.target).closest('.control-group').find('.help-modal').modal();
            e.preventDefault();
            x = modal;
        })

        $('.studyFooter a.btn').off('click').on('click', addStudy);
        $('.testFooter a.btn').off('click').on('click', addTest);
        $('body').scrollspy('refresh');
    }

    // Build the initial outline
    var ol = $('#outline');
    var studies = $('.study');
    for(var i=0; i<studies.length;i++) {
        var tests = studies.find('.test');
        var li = $('<li><a href="#s' + i + '">Study ' + (i+1) + '</a></li>')
        if(tests.length > 0) {
            var sublist = $('<ol class="nav"></ol>');
            for(var j=0; j<tests.length; j++) {
                sublist.append('<li><a href="#s' + i + 't' + j + '">Test ' + (i+1) + '.' + (j+1) + '</a></li>');
            }
            li.append(sublist);
        }

        ol.append(li);
    }
    $('#static-sidebar ol.nav').scrollspy();

    initSections();



    function addTest(e) {
        /* Add Test Button */
        e.preventDefault();

        var num_tests = $(e.target).closest('.study').find('.test').length;
        var study_id = Number($(e.target).closest('.study').data('study-seq'));

        $.get(
            '/tests/shell/' + study_id + '/' + num_tests,
            function(d) {
                // Add inputs to the form
                d = $(d);
                d.insertAfter( $(e.target).closest('.study').find('.test:last') )
                    .hide()
                    .slideDown();

                // Add test to the list
                var li = $('<li><a href="#s' + study_id + 't' + num_tests + '">Test ' + (study_id+1) + '.' + (num_tests+1) + '</a></li>')
                    .hide()
                    .appendTo('ol#outline li:nth-of-type(' + (study_id+1) + ') > ol')
                    .slideDown();

                // Add the list item to the test's div
                d.data('menu-item', li);

                // Make the buttons and such work.
                initSections();
            }
        );

    }


    function addStudy(e){
        /* Add Study Button */
        e.preventDefault();

        var codedpaper_id = $('#CodedpaperId').val();
        var num_studies = $('.study').length;

        $.get(
            '/studies/shell/' + codedpaper_id + '/' + num_studies,
            function(d) {
                // Add inputs to the form
                d = $(d);
                d.insertAfter($('form#CodedpaperEntryForm .study:last'))
                    .hide()
                    .slideDown();

                // Add study and test to the list
                var html = '<li><a href="#s' + num_studies + '">Study ' + (num_studies+1) + "</a>";
                html = html + '<ol class="nav"><li><a href="#s' + num_studies + 't0">Test ' + (num_studies+1) + '.1</a></li></ol>';
                $(html).hide()
                    .appendTo('ol#outline')
                    .slideDown();


                // Make the buttons and such work.
                initSections();
            }
        )
    }

    $('.deleteSection').on('click', function(e) {
        console.log(e.target);
    });
});

</script>