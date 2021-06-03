<?php
include_once('../simple_html_dom.php');

$content = array(
    "https://www.lawv.net/Get-Informed/News/Article/254/Unemployment-Compensation-and-SSI",
"https://www.lawv.net/Get-Informed/News/Article/259/American-Rescue-Plan-Act-Updates",
"https://www.lawv.net/Get-Informed/News/Article/261/Meet-Brendan-Wood-Our-Staff-Attorney-Working-with-West-Virginians-in-Recovery",
"https://www.lawv.net/Get-Informed/News/Article/262/Legal-Aid-of-WVs-Economic-Impact-Study",
"https://www.lawv.net/Get-Informed/News/Article/266/CDC-Order-on-Evictions-for-Non-Payment-of-Rent-Extended-COVID-19",
"https://www.lawv.net/Get-Informed/News/Article/267/LAWV-and-Unicare-Launch-Medical-Legal-Partnership",
"https://www.lawv.net/Get-Informed/News/Article/268/COVID-19-Help-for-West-Virginians-Presentation",
"https://www.lawv.net/Get-Informed/News/Article/252/Shirleys-Story",
"https://www.lawv.net/Get-Informed/News/Article/250/Mountaineer-Rental-Assistance-Program-Help-for-Renters-in-Need-Due-to-COVID-19",
"https://www.lawv.net/Get-Informed/News/Article/241/New-WV-Program-Provides-Help-for-Unpaid-Utility-Bills-related-to-COVID-19",
"https://www.lawv.net/Get-Informed/News/Article/226/Legal-Aid-of-WV-Launches-The-Education-Helpline",
"https://www.lawv.net/Get-Informed/News/Article/204/Veronicas-Story",
"https://www.lawv.net/Get-Informed/News/Article/199/Staff-Highlight-FAST-Advocate-Deana-Cummings",
"https://www.lawv.net/Get-Informed/News/Article/198/Board-Highlight-Tina-Faber",
"https://www.lawv.net/Get-Informed/News/Article/188/Judiths-Story",
"https://www.lawv.net/Get-Informed/News/Article/182/Staff-Highlight-ATLAS",
"https://www.lawv.net/Get-Informed/News/Article/181/Janes-Story",
"https://www.lawv.net/Get-Informed/News/Article/175/Staff-Highlight-Deborah-Worley",
"https://www.lawv.net/Get-Informed/News/Article/174/Reflecting-on-a-Legal-Aid-Summer",
"https://www.lawv.net/Get-Informed/News/Article/165/Staff-Highlight-Wheelings-David-Estep",
"https://www.lawv.net/Get-Informed/News/Article/153/Staff-Highlight-Ombudsman-Ed-Hopple",
"https://www.lawv.net/Get-Informed/News/Article/163/Staff-Highlight-Diane-Calandros",
"https://www.lawv.net/Get-Informed/News/Article/148/Staff-Highlight-Teri-Stone",
"https://www.lawv.net/Get-Informed/News/Article/147/2019-Law-Firm-Pro-Bono-Award-Lemon-Law-Office",
"https://www.lawv.net/Get-Informed/News/Article/143/Staff-Highlight-Parkersburgs-Jason-Heinrich",
"https://www.lawv.net/Get-Informed/News/Article/136/Special-Highlight-Board-President-Andy-Nason",
"https://www.lawv.net/Get-Informed/News/Article/135/One-of-Legal-Aids-Many-Love-Stories",
"https://www.lawv.net/Get-Informed/News/Article/133/Flight-then-Fight-A-Veteran-Client-Story",
"https://www.lawv.net/Get-Informed/News/Article/124/Siennas-Story",
"https://www.lawv.net/Get-Informed/News/Article/117/Staff-Highlight-Phillip-Pham-Clarksburg",
"https://www.lawv.net/Get-Informed/News/Article/116/Constances-Story",
"https://www.lawv.net/Get-Informed/News/Article/112/Samanthas-Story",
"https://www.lawv.net/Get-Informed/News/Article/107/Staff-Highlight-Michele-Good-Elkins",
"https://www.lawv.net/Get-Informed/News/Article/104/Faiths-Recovery-Finding-Stability-Finding-Her-Daughter",
"https://www.lawv.net/Get-Informed/News/Article/96/Mold-No-Heat-And-a-Collapsing-Roof-One-Familys-Search-For-Decent-Rental-Housing",
"https://www.lawv.net/Get-Informed/News/Article/95/Staff-Highlight-Paralegal-Cathy-Jo-Estep",
"https://www.lawv.net/Get-Informed/News/Article/91/Staff-Highlight-Sam-Kasley-Lewisburg-Office",
"https://www.lawv.net/Get-Informed/News/Article/86/Ashleys-Story-A-Client-Testimony",
"https://www.lawv.net/Get-Informed/News/Article/78/Rachels-Story",
"https://www.lawv.net/Get-Informed/News/Article/71/Beverlys-Story",
"https://www.lawv.net/Get-Informed/News/Article/66/Jerrys-Story",
"https://www.lawv.net/Get-Informed/News/Article/45/Legal-Aid-Helped-A-Family-Untie-A-Bureaucratic-Knot-That-Threatened-To-Break-Th",
"https://www.lawv.net/Get-Informed/Blog/Article/247/HELP304",
"https://www.lawv.net/Get-Informed/Blog/Article/246/The-Financial-Opportunity-Center-and-Digital-Navigator-Program",
"https://www.lawv.net/Get-Informed/Blog/Article/235/Protecting-Your-Personal-Information-in-an-Internet-Connected-World",
"https://www.lawv.net/Get-Informed/Blog/Article/234/Huntington-Opioid-Abuse-Services",
"https://www.lawv.net/Get-Informed/Blog/Article/217/Electronic-Benefits-Transfer-P-EBT-Funds-to-Support-the-Nutrition-Needs-of-Chil",
"https://www.lawv.net/Get-Informed/Blog/Article/209/Student-Loan-Permanent-Disability-Discharge",
"https://www.lawv.net/Get-Informed/Blog/Article/205/Rights-In-Subsidized-Housing-Regarding-Termination-of-Tenancy",
"https://www.lawv.net/Get-Informed/Blog/Article/202/New-HUD-Initiative-To-End-Homelessness-For-Youth-Aging-Out-Of-Foster-Care",
"https://www.lawv.net/Get-Informed/Blog/Article/196/Teenagers-in-Foster-Care",
"https://www.lawv.net/Get-Informed/Blog/Article/194/Educational-Stability-and-Protections-for-Homeless-Children-Under-the-McKinney",
"https://www.lawv.net/Get-Informed/Blog/Article/193/The-Family-Drug-Court-Treatment-Act",
"https://www.lawv.net/Get-Informed/Blog/Article/184/Create-Your-Own-Mental-Health-Advance-Directive",
"https://www.lawv.net/Get-Informed/Blog/Article/183/Tips-on-Active-Shooter-Situations",
"https://www.lawv.net/Get-Informed/Blog/Article/180/Reasonable-Heating-in-the-Winter",
"https://www.lawv.net/Get-Informed/Blog/Article/173/Informal-Networks-Forming-To-Address-W-V-s-Sex-Trafficking-Problem",
"https://www.lawv.net/Get-Informed/Blog/Article/170/Temporary-ID-Cards",
"https://www.lawv.net/Get-Informed/Blog/Article/169/When-Delegation-Becomes-Exploitation",
"https://www.lawv.net/Get-Informed/Blog/Article/162/Stand-For-Quality",
"https://www.lawv.net/Get-Informed/Blog/Article/156/The-Family-Refuge-Center",
"https://www.lawv.net/Get-Informed/Blog/Article/150/How-to-Get-Your-Security-Deposit-Back-in-West-Virginia",
"https://www.lawv.net/Get-Informed/Blog/Article/140/The-Healthy-Grandfamilies-Program",
"https://www.lawv.net/Get-Informed/Blog/Article/139/NECCO",
"https://www.lawv.net/Get-Informed/Blog/Article/138/Do-you-need-legal-help-with-starting-a-small-business-launching-a-non-profit-or",
"https://www.lawv.net/Get-Informed/Blog/Article/134/Earned-Income-Tax-Credit-or-EITC",
"https://www.lawv.net/Get-Informed/Blog/Article/127/Nursing-Home-Compare",
"https://www.lawv.net/Get-Informed/Blog/Article/123/Access-to-Assistive-Technology-for-WV-Residents-with-Disabilities",
"https://www.lawv.net/Get-Informed/Blog/Article/122/The-Indian-Child-Welfare-Act-ICWA",
"https://www.lawv.net/Get-Informed/Blog/Article/106/Use-College-Class-and-Vocational-Training-to-Fulfill-the-SNAP-Work-Requirement",
"https://www.lawv.net/Get-Informed/Blog/Article/101/Recognizing-Phishing-Emails",
"https://www.lawv.net/Get-Informed/Blog/Article/100/If-you-or-someone-you-know-has-been-sexually-assaulted-there-are-ways-that-Lega",
"https://www.lawv.net/Get-Informed/Blog/Article/99/When-Should-Farmers-Markets-be-Nonprofits",
"https://www.lawv.net/Get-Informed/Blog/Article/94/Using-Scanner-Applications-To-Share-Documents",
"https://www.lawv.net/Get-Informed/Blog/Article/88/West-Virginia-s-CLIMB",
"https://www.lawv.net/Get-Informed/Blog/Article/84/Office-of-Constituent-Services",
"https://www.lawv.net/Get-Informed/Blog/Article/82/Requesting-An-Evaluation-For-Special-Education-Services",
"https://www.lawv.net/Get-Informed/Blog/Article/74/How-Relatives-can-help-kids-involved-in-Abuse-and-Neglect-Cases",
"https://www.lawv.net/Get-Informed/Blog/Article/72/What-Are-the-Rules-About-Animals-in-Rental-Housing-What-can-the-landlord-prohib",
"https://www.lawv.net/Get-Informed/Blog/Article/70/Social-Security-Survivor-Benefits-for-Children-of-a-Deceased-Person",
"https://www.lawv.net/Get-Informed/Blog/Article/48/West-Virginia-Aging-and-Disability-Network-ADRN",
"https://www.lawv.net/Get-Informed/Blog/Article/41/Homes-for-Harrison",
"https://www.lawv.net/Get-Informed/Blog/Article/38/-I-think-my-ex-is-spying-on-me-through-my-phone",
"https://www.lawv.net/Get-Informed/Blog/Article/37/Getting-Unemployment-Benefits-If-You-Quit-Your-Job-Because-Of-A-Medical-Conditi",
"https://www.lawv.net/Get-Informed/Blog/Article/35/Criminal-Offense-Reduction-of-a-Felony",
"https://www.lawv.net/Get-Informed/Blog/Article/29/Resources-For-Starting-Your-Own-Business",
"https://www.lawv.net/Get-Informed/Blog/Article/24/Outpatient-Observation-May-Not-Be-Covered-By-Medicare",
"https://www.lawv.net/Get-Informed/Blog/Article/14/Grandparents-Rights-in-West-Virginia",
"https://www.lawv.net/Get-Informed/Blog/Article/10/West-Virginia-State-Health-Insurance-Assistance-Program-SHIP",
"https://www.lawv.net/Get-Informed/Blog/Article/8/Loan-Acceleration",
"https://www.lawv.net/Get-Informed/Blog/Article/7/Installment-Land-Sales-Contracts",
"https://www.lawv.net/Get-Informed/Blog/Article/1/Repossession-of-Assets",
);

//var_dump($content);
//$csv = file('../blog-posts.csv');



    // $csv = array_map('str_getcsv', file('../blog-posts.csv)'));
    // var_dump($csv);
    // array_walk($csv, function(&$a) use ($csv) {
    //   $a = array_combine($csv[0], $a);
    // });
    // array_shift($csv); # remove column header

function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}

//csv_to_array('../blog-posts.csv');
//var_dump(csv_to_array('../blog-posts.csv'));

$array = csv_to_array('../blog-posts.csv');
$json = json_encode($array, JSON_PRETTY_PRINT);
var_dump($json);

foreach ($content as $post){
    $html =  file_get_html($post);
	//echo $html;
	$main = $html->find('.article', 0);
	//echo $main;
	echo $main;
}

$html =  file_get_html('https://lawv.net/Resources/Self-Help-Library/Family/Spousal-Support-Frequently-Asked-Questions');
//echo $html;
$main = $html->find('#mainContent', 0);
echo $main;

//file_save_contents($html->)mainContent
?>