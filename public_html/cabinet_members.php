<?php
////////////////////////////CABINET MEMBERS/////////////////////////////////////////////////////////  
$executive = [

['title'=> 'President', 'image'=>get_user_info('@RealDonaldTrump')['profile_image_url'], 'name'=>get_user_info('@RealDonaldTrump')['name'], 'twitter_account' => '@realDonaldTrump', 'second_twitter_account' => '@potus', 'party' => 'R'],     

['title'=> 'Vice President', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Mike_Pence_new_official_portrait.jpg/100px-Mike_Pence_new_official_portrait.jpg', 'name'=>'Mike Pence', 'twitter_account' => '@vp', 'second_twitter_account' => '@mike_pence', 'party' => 'R'],

['title'=> 'Secretary of State', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Rex_Tillerson_official_Transition_portrait.jpg/100px-Rex_Tillerson_official_Transition_portrait.jpg', 'name'=>'Rex Tillerson', 'twitter_account' => '', 'second_twitter_account' => '', 'party' => 'R'],
    
['title'=> 'Secretary of the Treasury', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/d/da/Steven-Mnuchin.jpg/18px-Steven-Mnuchin.jpg', 'name'=>'Steve Mnuchin', 'twitter_account' => '@stevenmnuchin1', 'second_twitter_account' => '', 'party' => 'R'],

['title'=> 'Secretary of Defense', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/5/5c/James_Mattis_Official_SECDEF_Photo.jpg/100px-James_Mattis_Official_SECDEF_Photo.jpg', 'name'=>'James Mattis', 'twitter_account' => ' @realjimmattis', 'second_twitter_account' => '', 'party' => 'R'],



['title'=> 'Attorney General', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Jeff_Sessions%2C_official_portrait.jpg/100px-Jeff_Sessions%2C_official_portrait.jpg', 'name'=>'Jeff Sessions', 'twitter_account' => '@USAGSessions', 'second_twitter_account' => '@jeffsessions', 'party' => 'R'],

['title'=> 'Secretary of the Interior', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/2/23/Ryan_Zinke_official_photo.jpg/100px-Ryan_Zinke_official_photo.jpg', 'name'=>'Ryan Zinke', 'twitter_account' => '@RepRyanZinke', 'second_twitter_account' => '@RyanZinke', 'party' => 'R'],

['title'=> 'Secretary of Agriculture', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/1d/No_image.svg/100px-No_image.svg.png', 'name'=>'Mike Young', 'twitter_account' => '', 'second_twitter_account' => '', 'party' => 'R'],

['title'=> 'Secretary of Commerce', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/17/Wilbur_Ross_Official_Portrait_%28cropped%29.jpg/100px-Wilbur_Ross_Official_Portrait_%28cropped%29.jpg', 'name'=>'Wilbur Ross', 'twitter_account' => '@SecretaryRoss', 'second_twitter_account' => '@WilburRoss', 'party' => 'R'],

['title'=> 'Secretary of Labor', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/1c/HuglerEdward.jpg/100px-HuglerEdward.jpg', 'name'=>'Ed Hugler', 'twitter_account' => '@realDonaldTrump', 'party' => 'R'],

['title'=> 'Secretary of Health and Human Services', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Tom_Price_official_Transition_portrait.jpg/100px-Tom_Price_official_Transition_portrait.jpg', 'name'=>'Tom Price', 'twitter_account' => '@RepTomPrice', 'second_twitter_account' => '', 'party' => 'R'],

['title'=> 'Secretary of Housing and Urban Development', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/6/6d/HUD_Secretary%2C_Ben_Carson_%28cropped%29.jpg/100px-HUD_Secretary%2C_Ben_Carson_%28cropped%29.jpg', 'name'=>'Ben Carson', 'twitter_account' => '@SecretaryCarlson', 'second_twitter_account' =>'@RealBenCarson', 'party' => 'R'],

['title'=> 'Secretary of Transporation', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Elaine_L._Chao_%28cropped%29.jpg/100px-Elaine_L._Chao_%28cropped%29.jpg', 'name'=>'Elaine Chao', 'twitter_account' => '@SecElaineChao', 'second_twitter_account' => '@ElaineChao', 'party' => 'R'],

['title'=> 'Secretary of Energy', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Gov._Perry_CPAC_February_2015_Blue.jpg/100px-Gov._Perry_CPAC_February_2015_Blue.jpg', 'name'=>'Rick Perry', 'twitter_account' => '@SecretaryPerry', 'second_twitter_account' => '@GovernorPerry'],

['title'=> 'Secretary of Education', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Betsy_DeVos_official_photo_%28cropped%29.jpg/100px-Betsy_DeVos_official_photo_%28cropped%29.jpg', 'name'=>'Betsy Devos', 'twitter_account' => '@BetsyDeVosED', 'second_twitter_account' => '@BetsyDeVos', 'party' => 'R'],

['title'=> 'Secretary of Veterans Affairs', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/e/e8/SECVA-David-Shulkin-MD.jpg/100px-SECVA-David-Shulkin-MD.jpg', 'name'=>'David Shulkin', 'twitter_account' => '@secShulkin', 'party' => 'R'],

['title'=> 'Secretary of Homeland Security', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/c/cb/John_Kelly_official_DHS_portrait.jpg/100px-John_Kelly_official_DHS_portrait.jpg', 'name'=>'John F. Kelly', 'twitter_account' => '', 'second_twitter_account' => '', 'party' => 'R']
];
//printr($cabinet_members);

          
$cabinet = [
['title'=> 'White House Chief of Staff', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Reince_Priebus_by_Gage_Skidmore.jpg/100px-Reince_Priebus_by_Gage_Skidmore.jpg', 'name'=>'Reince Priebus', 'twitter_account' => '@Reince45', 'second_twitter_account' => '@Reince', 'party' => 'R'],  
    
['title'=> 'Trade Representative', 'image'=>'//upload.wikimedia.org/wikipedia/commons/6/6d/No_image.png', 'name'=>'Stephen Vaughn', 'twitter_account' => '', 'second_twitter_account' => '', 'party' => 'R'],

['title'=> 'Director of National Intelligence', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Dan_Coats_official_DNI_portrait.jpg/100px-Dan_Coats_official_DNI_portrait.jpg', 'name'=>'Dan Coats', 'twitter_account' => '@SenDanCoats', 'second_twitter_account' => '@DanCoats', 'party' => 'R'],
    
['title'=> 'Ambassador to the United Nations', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/2/21/Nikki_Haley_official_Transition_portrait.jpg/100px-Nikki_Haley_official_Transition_portrait.jpg', 'name'=>'Nikki Haley', 'twitter_account' => '@nikkihaley', 'party' => 'R'],

['title'=> 'Director of the Office of Management and Budget', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/18/Mick_Mulvaney%2C_Official_Portrait%2C_113th_Congress_%28cropped%29.jpg/100px-Mick_Mulvaney%2C_Official_Portrait%2C_113th_Congress_%28cropped%29.jpg', 'name'=>'Mick Mulvaney', 'twitter_account' => '', 'second_twitter_account' => '', 'party' => 'R'],

['title'=> 'Director of the Central Intelligence Agency', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/2/23/Mike_Pompeo_official_Transition_portrait.jpg/100px-Mike_Pompeo_official_Transition_portrait.jpg', 'name'=>'Mike Pompeo', 'twitter_account' => '@RealMikePompeo', 'second_twitter_account' => '', 'party' => 'R'],
          
['title'=> 'Administrator of the Environmental Protection Agency', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/9/91/Scott_Pruitt%2C_EPA_official_portrait_%28cropped%29.jpg/100px-Scott_Pruitt%2C_EPA_official_portrait_%28cropped%29.jpg', 'name'=>'Scott Pruitt', 'twitter_account' => '@EPAScottPruitt', 'second_twitter_account' => '@ScottPruittOK', 'party' => 'R'],

['title'=> 'Administrator of the Small Business Administration', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/4/41/Linda_McMahon_official_photo.jpg/100px-Linda_McMahon_official_photo.jpg', 'name'=>'Linda McMahon', 'twitter_account' => '@SBALinda', 'second_twitter_account' => '@LindaMcMahon', 'party' => 'R']
];


//////////////////////////////////////////////WHITE HOUSE OTHER/////////////////////////////////////////////////////////////////////////
$personelle = [
['title' => 'President', 'image' => get_user_info('@potus')['profile_image_url'], 'name' => get_user_info('@potus')['name'], 'twitter_account' => '@potus', 'second_twitter_account' => '@realDonaldTrump', 'party' => 'R'],

['title' => 'Vice President', 'image' => get_user_info('@vp')['profile_image_url'], 'name' => get_user_info('@vp')['name'], 'twitter_account' => '@mike_pence', 'second_twitter_account' => '@vp', 'party' => 'R'],

['title' => 'First Lady', 'image' => get_user_info('@flotus')['profile_image_url'], 'name' => get_user_info('@flotus')['name'], 'twitter_account' => '@flotus', 'second_twitter_account' => '', 'party' => 'R'],

['title' => 'White House Chief Strategist', 'image' => get_user_info('@SteveKBannon')['profile_image_url'], 'name' => get_user_info('@SteveKBannon')['name'], 'twitter_account' => 'no twitter account', 'second_twitter_account' => '', 'party' => 'R'],

['title' => 'Counselor to the President', 'image' => get_user_info('@KellyannePolls')['profile_image_url'], 'name' => get_user_info('@KellyannePolls')['name'], 'twitter_account' => '@KellyannePolls', 'second_twitter_account' => '', 'party' => 'R'],

['title' => 'White House Press Secretary', 'image' => get_user_info('@PressSec')['profile_image_url'], 'name' => get_user_info('@PressSec')['name'], 'twitter_account' => '@PressSec', 'second_twitter_account' => '', 'party' => 'R']
                  ];
                  
                  
                  
///////////////////////////////////////////////HOUSE LEADERS//////////////////////////////////////////////////////////////////////////                  
$republican_house_leaders = [

['title' => 'Speaker of the House', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Speaker_Paul_Ryan_official_photo_%28cropped_2%29.jpg/200px-Speaker_Paul_Ryan_official_photo_%28cropped_2%29.jpg', 'name' => 'Paul Ryan', 'twitter_account' => '@SpeakerRyan', 'second_twitter_account' => '@PRyan'],

['title' => 'House Majority Leader', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/7/70/House_Maj._Leader_Kevin_McCarthy_official_photo.jpg/93px-House_Maj._Leader_Kevin_McCarthy_official_photo.jpg', 'name' => 'Kevin McCarthy', 'twitter_account' => '@kevinomccarthy', 'second_twitter_account'=> ''],

['title' => 'House Majority Whip', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Steve_Scalise.jpg/94px-Steve_Scalise.jpg', 'name' => 'Steve Scalise', 'twitter_account' => '@SteveScalise', 'second_twitter_account' => '@GeauxScalise']
];                
                  

                  
$republican_senate_leaders = [

['title' => 'Senate Majority Leader', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Mitch_McConnell_close-up.JPG/100px-Mitch_McConnell_close-up.JPG', 'name' => 'Mitch McConnell', 'twitter_account' => 'SenateMajLdr', 'second_twitter_account' => 'McConnell Press'],

['title' => 'Senate Majority Whip', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/3/39/John_Cornyn_official_portrait%2C_2009.jpg/103px-John_Cornyn_official_portrait%2C_2009.jpg', 'name' => 'John Cornyn', 'twitter_account' => '@JohnCornyn']
];


$democrat_house_leaders = [

['title' => 'House Minority Leader', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Nancy_Pelosi_2012.jpg/104px-Nancy_Pelosi_2012.jpg', 'name' => 'Nancy Pelosi', 'first_name' => 'Nancy', 'last_name' => 'Pelosi', 'twitter_account' => '@NancyPelosi', 'second_twitter_account' => '', 'party' => 'D'],
    
['title' => 'House Minority Whip', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Steny_Hoyer%2C_official_photo_as_Whip.jpg/86px-Steny_Hoyer%2C_official_photo_as_Whip.jpg', 'name' => 'Steny Hoyer', 'first_name' => 'Steny', 'last_name' => 'Hoyer','twitter_account' => '', 'second_twitter_account' => '', 'party' => 'D'],
];
    
    


$democrat_senate_leaders = [

['title' => 'Senate Minority Leader', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Senator_Chuck_Schumer_%28cropped%29.jpg/112px-Senator_Chuck_Schumer_%28cropped%29.jpg', 'name' => 'Chuck Schumer', 'first_name' => 'Chuck', 'last_name' => 'Schumer', 'twitter_account' => 'SenSchumer', 'second_twitter_account' => '@chuckschumer', 'party' => 'D'],

['title' => 'Senate Minority Whip', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/0/03/Richard_Durbin_official_photo.jpg/103px-Richard_Durbin_official_photo.jpg', 'name' => 'Dick Durbin', 'first_name' => 'Dick', 'last_name' => 'Durbin',   'twitter_account' => '@SenatorDurbin', 'second_twitter_account' => '@DickDurbin', 'party' => 'D']
];

$all_members = array_merge($executive, $cabinet, $personelle);         
  ?>