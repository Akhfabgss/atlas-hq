<?php
/**
 * Template Name: Korean Desk / Mike Lee Profile
 */

get_header(); 

$mike_lee_data = [
    'name'           => 'MIKE (MYOUNG WOO) LEE',
    'title'          => 'CPCU, AIC, CILA, ANZIIF (Senior Assoc.) CIP',
    'email'          => 'mwlee@atlasadjusting.net',
    'phone'          => '+62 811 1769 219',
    'image_url'      => get_template_directory_uri() . '/assets/images/professionals/AtlasMike.png',
    'qr_code_url'     => get_template_directory_uri() . '/assets/images/qr-code/AtlasMike.png',
    
    'bio_paragraphs' => [
        'Lee Myoung Woo is a distinguished professional whose career is built upon a formidable integration of advanced engineering education and top-tier international insurance qualifications. His academic foundation, a Master of Engineering, provides him with a rigorous technical framework for understanding complex risks and failures.',
        'This engineering mindset is powerfully complemented by an exceptional suite of professional designations, including the prestigious Chartered Property Casualty Underwriter (CPCU), the Associate in Claims (AIC), and dual diplomas in loss adjusting from both the Australian and New Zealand Institute of Insurance and Finance (ANZIIF) and the U.K.’s Chartered Institute of Loss Adjusters (CILA).',
        'This rare combination of skills was honed over a significant 15-year tenure at DB Insurance, where he progressed into pivotal leadership positions. As Risk Management Manager, he was responsible for the proactive identification, assessment, and mitigation of corporate risks, while his role as Claims Manager required him to oversee the post-loss process, managing complex claims with both technical precision and strategic oversight.',
        'This unique blend of deep technical knowledge, certified insurance expertise, and proven managerial leadership in critical functions makes him a highly authoritative figure in the fields of engineering, risk management, and insurance.',
    ],

    'experiences'    => [
        [
            'title' => '15-Year Tenure at DB Insurance',
            'desc'  => 'Pivotal leadership positions progressing across technical evaluation and corporate operations.',
        ],
        [
            'title' => 'Risk Management Manager',
            'desc'  => 'Responsible for proactive identification, assessment, and mitigation of complex corporate risks.',
        ],
        [
            'title' => 'Claims Manager',
            'desc'  => 'Overseeing post-loss processes and managing complex loss assessments with technical precision.',
        ],
    ],

    'qualifications' => [
        [
            'title' => 'Master of Engineering',
            'desc'  => 'Advanced academic engineering background providing a technical framework for risk failure analysis.',
        ],
        [
            'title' => 'Chartered Property Casualty Underwriter (CPCU)',
            'desc'  => 'Premier global professional designation in property and casualty insurance.',
        ],
        [
            'title' => 'Associate in Claims (AIC)',
            'desc'  => 'Specialized certification in claims handling practices and loss evaluation procedures.',
        ],
        [
            'title' => 'Chartered Institute of Loss Adjusters (CILA)',
            'desc'  => 'U.K. loss adjusting diploma certifying high professional standards.',
        ],
        [
            'title' => 'ANZIIF (Senior Assoc.) CIP',
            'desc'  => 'Dual diplomas in loss adjusting from Australian and New Zealand Institute of Insurance and Finance.',
        ],
    ],
];
?>

<div class="site-main bg-slate-50">
    <?php 
    get_template_part('template-parts/profile/single-profile', null, $mike_lee_data); 
    ?>
</div>

<?php 
get_footer(); 
?>