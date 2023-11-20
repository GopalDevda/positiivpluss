<?php

?>
<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <!-- <h2 class="content-header-title float-start mb-0">GUIDES</h2> -->
                        <div class="breadcrumb-wrapper">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="basic-tabs-components">
            <div class="card">


                <div class="row mb-0">
                    <div class="col-6 mx-2">
                        <div class="icon-search-wrapper my-3 mx-auto">
                            <div class="mb-1 input-group input-group-merge">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="text" class="form-control" id="search" placeholder="Search Glossary...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs px-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" aria-controls="all" role="tab" aria-selected="true">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="a-tab" data-bs-toggle="tab" href="#a" aria-controls="a" role="tab" aria-selected="false">A</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="b-tab" data-bs-toggle="tab" href="#b" aria-controls="b" role="tab" aria-selected="false">B</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="c-tab" data-bs-toggle="tab" href="#c" aria-controls="c" role="tab" aria-selected="false">C</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="d-tab" data-bs-toggle="tab" href="#d" aria-controls="d" role="tab" aria-selected="false">D</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="e-tab" data-bs-toggle="tab" href="#e" aria-controls="e" role="tab" aria-selected="false">E</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="f-tab" data-bs-toggle="tab" href="#f" aria-controls="f" role="tab" aria-selected="false">F</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="g-tab" data-bs-toggle="tab" href="#g" aria-controls="g" role="tab" aria-selected="false">G</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="h-tab" data-bs-toggle="tab" href="#h" aria-controls="h" role="tab" aria-selected="false">H</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="i-tab" data-bs-toggle="tab" href="#i" aria-controls="i" role="tab" aria-selected="false">I</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="j-tab" data-bs-toggle="tab" href="#j" aria-controls="j" role="tab" aria-selected="false">J</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="k-tab" data-bs-toggle="tab" href="#k" aria-controls="k" role="tab" aria-selected="false">K</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="l-tab" data-bs-toggle="tab" href="#l" aria-controls="l" role="tab" aria-selected="false">L</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="m-tab" data-bs-toggle="tab" href="#m" aria-controls="m" role="tab" aria-selected="false">M</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="n-tab" data-bs-toggle="tab" href="#n" aria-controls="n" role="tab" aria-selected="false">N</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="o-tab" data-bs-toggle="tab" href="#o" aria-controls="o" role="tab" aria-selected="false">O</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="p-tab" data-bs-toggle="tab" href="#p" aria-controls="p" role="tab" aria-selected="false">P</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="r-tab" data-bs-toggle="tab" href="#r" aria-controls="r" role="tab" aria-selected="false">R</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="s-tab" data-bs-toggle="tab" href="#s" aria-controls="s" role="tab" aria-selected="false">S</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="t-tab" data-bs-toggle="tab" href="#t" aria-controls="t" role="tab" aria-selected="false">T</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="u-tab" data-bs-toggle="tab" href="#u" aria-controls="u" role="tab" aria-selected="false">U</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="v-tab" data-bs-toggle="tab" href="#v" aria-controls="v" role="tab" aria-selected="false">V</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="w-tab" data-bs-toggle="tab" href="#w" aria-controls="w" role="tab" aria-selected="false">W</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="all" aria-labelledby="all-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>AA1000</h4>
                                    <p class="mb-2 pb-75">The AA1000 Standard Series developed by UK-based AccountAbility are principle-based standards for helping organizations become more accountable, responsible and sustainable. The AA1000 Accountability Principles Standard (AA1000APS) provides a framework for an organization to identify, prioritize and respond to its sustainability challenges. The AA1000 Assurance Standard (AA1000AS) provides a methodology for assurance practitioners regarding implementation of the principles. The AA1000 Stakeholder Engagement Standard (AA1000SES) provides a framework to help organizations integrate stakeholder engagement processes into their activities.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Accident Frequency Rate</h4>
                                    <p>The accident frequency rate (or Lost Time Injury Frequency Rate) measures the number of injuries with lost time in relation to the total amount of time worked. It both indicates the extent to which injury incidents are repeated over time and their number of occurrence.</p>
                                </div>
                            </div>
                            <div class="search_content">
                                <h4>Accident Severity Rate</h4>
                                <p>The accident severity rate (or Lost Time Injury Severity Rate) measures the time lost due to occupational injuries in relation to the total amount of time worked. It indicates how severe the accidents were and how long the injured employees were out of work as a result of disabling injuries.</p>
                            </div>
                            <div class="search_content">
                                <h4>Accreditation of Laboratory Animal Care (AAALAC)</h4>
                                <p class="mb-2 pb-75">The AAALAC International accreditation program evaluates organizations that use animals in research, teaching or testing. Those that meet or exceed AAALAC standards are awarded accreditation. The accreditation process includes an extensive internal review conducted by the institution applying for accreditation. During this review, the institution creates a comprehensive document called a “Program Description” which describes all aspects of the animal care and use program (policies, animal housing and management, veterinary care, and facilities). AAALAC evaluators review the Program Description and conduct their own comprehensive on-site assessment. The site visitors’ report is then reviewed by the entire Council on Accreditation and accreditation status is determined. If deficiencies are found, they are outlined in a letter and the institution is given a period of time to correct them. Once the deficiencies are corrected, accreditation is awarded. The entire process is completely confidential. After an institution earns accreditation, it must be re-evaluated every three years in order to maintain its accredited status. Currently more than 925 organizations in 40 countries have earned AAALAC accreditation.</p>
                            </div>
                            <div class="search_content">
                                <h4>Acid Rock Drainage Management Plan</h4>
                                <p class="mb-2 pb-75">Acid rock drainage (ARD) occurs when certain rocks, when exposed to air and water, generate acidic runoff, and the acidity of the runoff may pollute nearby water resources. The nature of the rock, chemical reactions, resultant solution acidity levels, and severity of the environmental impact are site-specific. An ARD Management Plan includes sampling, testing, modeling, and analysis to determine appropriate action to minimize facilities' impact on water quality impairment by acid rock drainage.</p>
                            </div>
                            <div class="search_content">
                                <h4>AdvaMed</h4>
                                <p class="mb-2 pb-75">The Advanced Medical Technology Association (AdvaMed), is a trade association that leads the effort to advance medical technology in order to achieve healthier lives and healthier economies around the world. AdvaMed represents 80 percent of medical technology firms in the United States and acts as the common voice for companies producing medical devices, diagnostic products and health information systems.</p>
                            </div>
                            <div class="search_content">
                                <h4>AFAQ 26000</h4>
                                <p class="mb-2 pb-75">The AFAQ 26000 method determines to what extent an organization (company, association, administration, trade union) integrates the recommendations of the ISO 26000 standard. It measures CSR maturity according to the standard ISO 26000. Sectorial approaches were also developed for certain types of entities. [Source: AFNOR]</p>
                            </div>
                            <div class="search_content">
                                <h4>Anaerobic Digestion</h4>
                                <p class="mb-2 pb-75">Anaerobic digestion is a series of processes in which microorganisms break down biodegradable material in the absence of oxygen to produce biogas, principally composed of methane and carbon dioxide. It is used as part of the process to treat biodegradable waste and sewage sludge, which can be used as a source of renewable energy.</p>
                            </div>
                            <div class="search_content">
                                <h4>Anticompetitive Practices (EcoVadis Criteria)</h4>
                                <p class="mb-2 pb-75">It is one of the EcoVadis criteria that deals with anti-competitive practices including, among others, bid-rigging, price fixing, dumping, predatory pricing, coercive monopoly, dividing territories, product tying, limit pricing and the non-respect of intellectual property.</p>
                            </div>
                            <div class="search_content">
                                <h4>Anti-Trust and Monopoly Practices</h4>
                                <p class="mb-2 pb-75">Antitrust and monopoly practices include actions of an organization that may result in collusion to erect barriers to entry to the sector, unfair business practices, abuse of market position, cartels, anti-competitive mergers, price-fixing, and other collusive actions which prevent competition. [Source: GRI]</p>
                            </div>
                            <div class="search_content">
                                <h4>Aquaculture Stewardship Council (ASC)</h4>
                                <p class="mb-2 pb-75">The Aquaculture Stewardship Council (ASC) is an independent, non-profit organization that aims to be the world's leading certification and labelling programme for responsibly farmed seafood. The ASC's primary role is to manage global standards for responsible aquaculture, which were developed by the World Wildlife Fund Aquaculture Dialogues. ASC works with aquaculture producers, seafood processors, retail and foodservice companies, scientists, conservation groups, and consumers, in order to: recognise and reward responsible aquaculture through the ASC aquaculture certification programme and seafood label, promote best environmental and social choice when buying seafood, and contribute to transforming seafood markets towards sustainability.</p>
                            </div>
                            <div class="search_content">
                                <h4>Association Connecting Electronics Industries (IPC)</h4>
                                <p class="mb-2 pb-75">IPC is a global trade association dedicated to furthering the competitive excellence and financial success of its members, who are participants in the electronics industry. In pursuit of these objectives, IPC will devote resources to management improvement and technology enhancement programs, the creation of relevant standards, protection of the environment, and pertinent government relations.</p>
                            </div>
                            <div class="search_content">
                                <h4>Banking Environment Initiative (BEI)</h4>
                                <p class="mb-2 pb-75">The Chief Executives of some of the world’s largest banks created the Banking Environment Initiative (BEI) in 2010. Its mission is to lead the banking industry in collectively directing capital towards environmentally and socially sustainable economic development.</p>
                            </div>
                            <div class="search_content">
                                <h4>Basel Convention</h4>
                                <p class="mb-2 pb-75">The Basel Convention on the Control of Transboundary Movements of Hazardous Wastes and their Disposal, which came into force in 1992, is the most comprehensive global environmental agreement on hazardous and other wastes. The Convention has 172 Parties and aims to protect human health and the environment against the adverse effects resulting from the generation, management, transboundary movements and disposal of hazardous and other wastes.</p>
                            </div>
                            <div class="search_content">
                                <h4>Bid Rigging</h4>
                                <p class="mb-2 pb-75">Bid rigging is an illegal conspiracy in which competitors join to artificially increase the prices of goods and/or services offered in bids to potential customers. Bid rigging is a felony punishable by fines, imprisonment or both.</p>
                            </div>
                            <div class="search_content">
                                <h4>Biochemical Oxygen Demand (BOD)</h4>
                                <p class="mb-2 pb-75">Biochemical Oxygen Demand is a measurement used as an indication of the organic quality of water. Wastewater often contains organic materials (food or organic carbons) that are decomposed by microorganisms, which use oxygen in the process. The amount of oxygen consumed by these organisms in breaking down the waste is known as BOD. If dissolved oxygen levels fall below 2 mg/l for more than even a few hours, this can result in fish kills. [Source: EPA]</p>
                            </div>
                            <div class="search_content">
                                <h4>Biochemicals</h4>
                                <p class="mb-2 pb-75">A biochemical substance is a chemical substance that occur in animals, microorganisms, and plants.</p>
                            </div>
                            <div class="search_content">
                                <h4>Biocides</h4>
                                <p class="mb-2 pb-75">Biocides represent a wide range of products e.g. disinfectants, wood preservatives, rodenticides, antifouling agents (on boats), in-can preservatives, used in homes, public places such as hospitals, and industries, to destroy and control viruses, bacteria, algae, moulds, insects, mice or rats. They help prevent the spread of diseases and food poisoning. Increased or unmonitored usage can have detrimental impacts on the local environment. </p>
                            </div>
                            <div class="search_content">
                                <h4>Biodiversity (EcoVadis Criteria)</h4>
                                <p class="mb-2 pb-75">It is one of the EcoVadis criteria that covers impacts from operations on animals (e.g. animal mistreatment, endangered species and land protected areas).</p>
                            </div>
                            <div class="search_content">
                                <h4>Biodynamic Agriculture</h4>
                                <p class="mb-2 pb-75">Biodynamic agriculture was developed as a means of a more advanced and holistic method of farming and gardening, in reaction to the declining in soil quality and animal health on farms. It is based on a view of nature as a living, self-sustaining organism; there is no use of GMOs, synthetic chemicals, fertilizers, or pesticides. It seeks to embody ecological, social, and economical sustainability approaches into an agricultural system. </p>
                            </div>
                            <div class="search_content">
                                <h4>Biofuel</h4>
                                <p class="mb-2 pb-75">Biofuels are any solid, liquid or gaseous fuels produced from biomass. Types of biofuels include biodiesel, bioalcohols, ethanol, biogas, and algae. [Source: Roundtable on Sustainable Biofuels] </p>
                            </div>
                            <div class="search_content">
                                <h4>Biomass</h4>
                                <p class="mb-2 pb-75">The term biomass refers to the biodegradable fraction of products, waste, and residues from biological origin (e.g. from agriculture, forestry and related industries including fisheries and aquaculture), as well as the biodegradable fraction of industrial and municipal waste. Bioenergy refers to all energy produced from biomass, including biofuels. It can be used either directly (wood energy) after methanogenesis (biogas) or new chemical transformations (biofuel). [Source: Roundtable on Sustainable Biofuels] </p>
                            </div>
                            <div class="search_content">
                                <h4>Biopiracy</h4>
                                <p class="mb-2 pb-75">Biopiracy refers to the appropriation of the knowledge and genetic resources of farming and indigenous communities by individuals or institutions that seek exclusive monopoly control (patents or intellectual property) over these resources and knowledge, usually without compensating the indigenous peoples or countries from which the material or relevant knowledge is obtained. </p>
                            </div>
                            <div class="search_content">
                                <h4>Bioplastics</h4>
                                <p class="mb-2 pb-75">Bioplastics, unlike traditional plastics which are derived from petroleum, are derived from renewable resources, such as vegetable fats and oils, corn starch, pea starch, or microbiota. Some bioplastics are biodegradable. </p>
                            </div>
                            <div class="search_content">
                                <h4>Bisphenols</h4>
                                <p class="mb-2 pb-75">The Universal Declaration of Human Rights was adopted by the United Nations General Assembly in 1948. It consists of 30 articles which outline human rights guaranteed to all people, including the right to life, the prohibition against slavery, torture and arbitrary arrest, equality before the law, and the freedom of movement, peaceful assembly, and participation in government. [Source: UN] </p>
                            </div>
                            <div class="search_content">
                                <h4>Blue Angel</h4>
                                <p class="mb-2 pb-75">The Blue Angel (Blauer Engel) is a recognized German certification for environmentally friendly products and services. It promotes the concerns of both environmental protection and consumer protection. Applicants are systematically certified against the ecolabel criteria before using the label. The Blue Angel covers around 10,000 products in 80 product categories. </p>
                            </div>
                            <div class="search_content">
                                <h4>Bluesign® System</h4>
                                <p class="mb-2 pb-75">The Bluesign® system is aiming at promoting sustainable textile production. It eliminates harmful substances right from the beginning of the manufacturing process and sets and controls standards for an environmentally friendly and safe production. This not only ensures that the final textile product meets very stringent consumer safety requirements worldwide but also provides confidence to the consumer to acquire a sustainable product. [Source: Bluesign] </p>
                            </div>
                            <div class="search_content">
                                <h4>British Retail Consortium Standards (BRC)</h4>
                                <p class="mb-2 pb-75">The BRC Global Standards are a global safety and quality certification program, which was originally developed by the food service industry to enable suppliers to be audited by third party certification bodies. It now comprises a suite of four Standards covering different product types – food, consumer products, packaging manufacturers, and storage & distribution. These standards assist suppliers to in producing safe, legal products that meet customers' quality specifications, along with meeting their needs of legal responsibility where they sub-contract manufacturing of their own-brand goods. </p>
                            </div>
                            <div class="search_content">
                                <h4>Brominated Flame Retardants (BFR)</h4>
                                <p class="mb-2 pb-75">Brominated flame retardants are chemicals applied to materials to make them fire-resistant. They contain chemicals, including Polybrominated diphenyl ethers or PBDE, a bioaccumulative substance shown to lead to health hazards. The European Union decided to ban the use of two classes of flame retardants including PBDE (see RoHS Directive). </p>
                            </div>
                            <div class="search_content">
                                <h4>Building Research Establishment Environmental Assessment Method (BREEAM)</h4>
                                <p class="mb-2 pb-75">Building Research Establishment Environmental Assessment Method (BREEAM) is an environmental assessment method for buildings originally established in the UK. It sets standards in sustainable design, construction, and operation. A certified BREEAM assessment is delivered by an external organization at various stages in the building's construction. </p>
                            </div>
                            <div class="search_content">
                                <h4>Business In The Community (BITC)</h4>
                                <p class="mb-2 pb-75">Business in the Community (BITC) is a British business-led charity with 850 members which advises and supports companies to create a sustainable for people and the planet and to improve business performance. </p>
                            </div>
                            <div class="search_content">
                                <h4>Business Principles for Countering Bribery (BPCB)</h4>
                                <p class="mb-2 pb-75">The Business Principles for Countering Bribery are the outcome of a multi-stakeholder dialog led by Transparency International (TI) that aims to create a framework that companies could use to build their own policies against bribery. It provides definitions of related terms, outlines effective policies, and sets a baseline for what should be covered in company policy. It is accompanied by a six step implementation process to assist companies in integrating bribery policy into overall policy and practice, as well as communication, training, monitoring, and improvement. </p>
                            </div>
                            <div class="search_content">
                                <h4>Business Social Compliance Initiative (BSCI)</h4>
                                <p class="mb-2 pb-75">BSCI is an initiative of the Foreign Trade Association (FTA) in response to the increasing business demand for transparent and improved working conditions in the global supply chain. They unite over 1,500 companies around one common Code of Conduct and support them in their efforts towards building an ethical supply chain by providing them with a step-by-step development-oriented system, applicable to all sectors and all sourcing countries. </p>
                            </div>
                            <div class="search_content">
                                <h4>Business Social Compliance Initiative (BSR)</h4>
                                <p class="mb-2 pb-75">Business for Social Responsibility (BSR) is a non-profit organization with membership. Since 1992, BSR works with a global network of more than 300 member companies to develop sustainable business strategies and solutions through consulting, research, and cross-sector collaboration. </p>
                            </div>
                            <div class="search_content">
                                <h4>Carbon Capture and Storage (CCS)</h4>
                                <p class="mb-2 pb-75">Carbon capture and storage (CCS) is a process based on collecting or capturing carbon dioxide (CO2) from large industrial plants (e.g. fossil fuel power plant), and storing in deep underground geological structures or underground reservoirs instead of releasing it into the atmosphere. Also known as sequestration or carbon capture and sequestration, CCS is a means of mitigating the contribution of fossil fuel emissions to global warming. While technology has been demonstrated on a small scale, it is foreseen to grow to full-scale, commercial projects by 2020. </p>
                            </div>
                            <div class="search_content">
                                <h4>Carbon Dioxide Equivalent (CO2E)</h4>
                                <p class="mb-2 pb-75">Carbon dioxide equivalent (CO2E) is a measure used to compare the emissions from various greenhouse gases based on their global warming potential (GWP). The CO2E for a gas is derived by multiplying the tons of the gas by the associated GWP. </p>
                            </div>
                            <div class="search_content">
                                <h4>Carbon Disclosure Project (CDP)</h4>
                                <p class="mb-2 pb-75">The Carbon Disclosure Project is an independent not-for-profit organization, after an initiative led by the institutional investor community. Each year, large corporations are asked through comprehensive questionnaires to disclose their GHGs and climate change strategies in their CDP response. The CDP channels information and progress through five separate programs, which also include CDP Water Disclosure, and CDP Supply Chain. </p>
                            </div>
                            <div class="search_content">
                                <h4>Carbon Footprint</h4>
                                <p class="mb-2 pb-75">A carbon footprint is the amount of GHGs or CO2E emitted to the air by an organization, company, household, product, building, etc. International standards such as ISO 14064 provide an international standard for organizations based on the GHG protocol. The upcoming ISO 14067 standard defines the carbon footprint of a product as the sum of GHGs and removals in a product system, expressed as CO2E and based on a life cycle assessment. </p>
                            </div>
                            <div class="search_content">
                                <h4>Carbon Neutral Program</h4>
                                <p class="mb-2 pb-75">The Carbon Neutral Program is a standard created by the Australian Government, that certifies products, operations or events as carbon neutral against the National Carbon Offset Standard (NCOS). Certification is achieved through the measurement and reduction of GHGs through calculations and audits, followed by the offset of remaining GHGs. </p>
                            </div>
                            <div class="search_content">
                                <h4>Carbon Offsetting</h4>
                                <p class="mb-2 pb-75">Carbon offsetting is the act of mitigating greenhouse gas emissions. A well-known example is the purchasing of carbon credits or offsets to compensate for the GHGs from personal air travel. </p>
                            </div>
                            <div class="search_content">
                                <h4>Career Management & Training (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Career management is one of the EcoVadis criteria, which assesses policies and measures taken by companies to ensure regular assessment and appraisal of employee performance, provision of vocational training, activities and actions to support individual career goals and the management of layoffs. </p>
                            </div>
                            <div class="search_content">
                                <h4>Cement Sustainability Initiative (CSI)</h4>
                                <p class="mb-2 pb-75">The Cement Sustainability Initiative (CSI) is a three-phase program in the cement industry comprising stakeholder consultation, business planning, and action and progress reporting on environmental and social issues. It gathers major cement producers with operations in more than 100 countries. </p>
                            </div>
                            <div class="search_content">
                                <h4>CERES Principles</h4>
                                <p class="mb-2 pb-75">A ten-point code of corporate environmental conduct to be publicly endorsed by companies as an environmental mission statement or ethic. The principles cover issues such as use of natural resources, waste disposal, energy conservation, product safety, remediation, transparency and management practices. CERES is a U.S. based non-profit organization, which comprises investors, companies and public interest groups and advocates for sustainability leadership. </p>
                            </div>
                            <div class="search_content">
                                <h4>Chain-of-Custody (CoC)</h4>
                                <p class="mb-2 pb-75">Chain-of-custody (CoC) refers to the chronological documentation to track a material throughout its production process. An example of chain of custody certification could be the PEFC or FSC trademarks for responsible wood products. Wood is tracked at all successive stages of processing, transformation, manufacturing and distribution. The MSC (Marine Stewardship council) for seafood products is another example of CoC. *Note: CoC is also an acronym for Code of Conduct. </p>
                            </div>
                            <div class="search_content">
                                <h4>Chemical Oxygen Demand (COD)</h4>
                                <p class="mb-2 pb-75">Chemical Oxygen Demand (COD) is a measure of the capacity of water to consume oxygen during the decomposition of organic matter and the oxidation of inorganic chemicals such as ammonia and nitrite under specific conditions of temperature and for a particular period of time. It is widely used as an indication of the quality of water. COD is used as a general indicator of water quality and is an integral part of all water quality management programs. COD analysis is a measurement of the oxygen-depletion capacity of a water sample contaminated with organic waste matter. Specifically, it measures the equivalent amount of oxygen required to chemically oxidize organic compounds in water. It is often used to estimate BOD (Biochemical Oxygen Demand), as a strong correlation exists between COD and BOD, however COD is a much faster, more accurate test. </p>
                            </div>
                            <div class="search_content">
                                <h4>Child Labor (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">It is one of the EcoVadis criteria, which assesses policies and measures taken by companies to deal with child, forced or compulsory labor issues within the company owned operations. </p>
                            </div>
                            <div class="search_content">
                                <h4>Chlorinated compounds</h4>
                                <p class="mb-2 pb-75">Chlorinated Compounds include chemicals such as PCE (tetrachloroethene) and TCE (trichloroethene) that are commonly used in dry cleaning and industrial operations. These chemicals can breakdown into others which may also be of concern for vapor intrusion. They do not readily biodegrade in subsurface soil and may require active remediation to remove. In addition, they persist in the environment for a long time after their release. </p>
                            </div>
                            <div class="search_content">
                                <h4>Chlorinated Hydrocarbon (CHC)</h4>
                                <p class="mb-2 pb-75">Chlorinated Hydrocarbons are a group of chemicals composed of carbon, chlorine, and hydrogen. As pesticides, they are also referred to by several other names, including chlorinated organics, chlorinated insecticides, and chlorinated synthetics. Although the first chlorinated hydrocarbon was synthesized in 1874, its insecticidal properties were not discovered until 1939. It was introduced as DDT in 1942 during World War II, and its subsequent use is responsible for saving millions of lives from vectored diseases, such as typhus and malaria. It is partially banned today because of its potential negative impacts on human health (and on the environment), such as breast & other cancers, male infertility, miscarriages and low birth weight, developmental delay and nervous system & liver damage. </p>
                            </div>
                            <div class="search_content">
                                <h4>Chromium</h4>
                                <p class="mb-2 pb-75">Chromium is a heavy metal mainly used in metal alloys such as stainless steel and in the chemical industry and refractory and foundry industries. Hexavalent chromium is used for the production of stainless steel, textile dyes, wood preservation, leather tanning, and as anti-corrosion and conversion coatings. It is very toxic and mutagenic when inhaled, has carcinogenic properties, and can cause allergies. In the European Union, the use of hexavalent chromium in electronic equipment is largely prohibited by the RoHS Directive. </p>
                            </div>
                            <div class="search_content">
                                <h4>Clean Clothes Campaign (CCC)</h4>
                                <p class="mb-2 pb-75">The Clean Clothes Campaign (CCC) is an alliance of organizations in 15 European countries dedicated to improving working conditions and supporting the empowerment of workers in the global garment and sportswear industries. </p>
                            </div>
                            <div class="search_content">
                                <h4>Clean Development Mechanism (CDM)</h4>
                                <p class="mb-2 pb-75">The Clean Development Mechanism (CDM) is part of the Kyoto Protocol and is designed to facilitate international financing of reductions of GHGs in developing countries, which do not have quantitative emissions targets under the Protocol. The CDM allows companies from developed countries to reduce their emissions through the acquisition of ‘certified emissions reductions’ (CERs) while providing developing countries with technology that will reduce their emissions. Diverse range of projects include: renewable energy, GHG capture (e.g. HFC), and reforestation. Over 3500 CDM projects have been registered so far and 3300 remain at validation stage. </p>
                            </div>
                            <div class="search_content">
                                <h4>CleanGredients</h4>
                                <p class="mb-2 pb-75">CleanGredients is an online database of chemical products used primarily to formulate residential, institutional, industrial, and janitorial cleaning products that have been pre-approved to meet the U.S. EPA's Safer Choice Standard. It is a purchasing resource for formulators who are seeking to find suppliers selling chemical ingredients that will help them to obtain the Safer Choice label in a manner that reduces risk to their business, saves them money, and gets their products to market faster. </p>
                            </div>
                            <div class="search_content">
                                <h4>Clean-in-Place (CIP)</h4>
                                <p class="mb-2 pb-75">Clean-in-Place (CIP) is a method of cleaning the interior surfaces of pipes, vessels, process equipment, filters and associated fittings, without disassembly. It is generally integrating during the equipment design, and allows cleaning through a parallel water circuit </p>
                            </div>
                            <div class="search_content">
                                <h4>Climate Disclosure Leadership Index (CDLI)</h4>
                                <p class="mb-2 pb-75">The Climate Disclosure Leadership Index (CDLI) is comprised of companies that have had their climate disclosures independently assessed and ranked against CDP’s widely-respected scoring methodology. To qualify for inclusion in the leadership index, a company has to make its response public, and show high-quality disclosure as a top scoring company, in order to reveal which companies around the world are doing the most to combat climate change. [Source: CDP] </p>
                            </div>
                            <div class="search_content">
                                <h4>Closed Loop Water Cooling System</h4>
                                <p class="mb-2 pb-75">A closed loop water cooling system is a closed circulation system which allows for zero water discharge. The system reuses the contaminated water accumulated in buildings, industrial plants and facilities as a coolant. Water cooling is commonly used for large industrial facilities such as steam electric power plants, hydroelectric generators, petroleum refineries and chemical plants. </p>
                            </div>
                            <div class="search_content">
                                <h4>CO2 Exchange Trading Scheme</h4>
                                <p class="mb-2 pb-75">These types of schemes refer to the trading of carbon, such as the EU Emissions Trading System. It can act as a tool to reduce industrial greenhouse gas emissions, including CO2 in a cost-effective manner. Companies can receive, buy, or trade allowances - limiting the total number allows for value as well as overall limiting of emissions. Decreasing the number on a regular basis will lead to lowering of emissions long term. </p>
                            </div>
                            <div class="search_content">
                                <h4>Code of Ethics</h4>
                                <p class="mb-2 pb-75">A code of ethics is a written set of guidelines issued by an organization to its workers and management to help them conduct their actions in accordance with its primary values and ethical standards. </p>
                            </div>
                            <div class="search_content">
                                <h4>Coercive Monopoly</h4>
                                <p class="mb-2 pb-75">A coercive monopoly is a business situation in which competitors cannot enter a market, with the natural result being that the firm established is able to make pricing and operate in a given sector without any influence from competitive forces. </p>
                            </div>
                            <div class="search_content">
                                <h4>Cogeneration</h4>
                                <p class="mb-2 pb-75">Cogeneration is a system that continuously and simultaneously generates at least two different forms of energy from a single fuel source. The electricity generator recovers and reuses its own waste heat from combustion of processed natural gas or petroleum gas. </p>
                            </div>
                            <div class="search_content">
                                <h4>Combined Heat and Power (CHP)</h4>
                                <p class="mb-2 pb-75">A combined heat and power (CHP) or cogeneration plant generates both electricity and heat in the same process. A CHP system captures some or all of the by-product heat for heating purposes. Such systems are common in pulp and paper mills, refineries and chemical plants. In Europe, the Combined Heat and Power Directive promotes the use of cogeneration in order to increase the energy efficiency and improve the security of energy supply. </p>
                            </div>
                            <div class="search_content">
                                <h4>Communication on Progress (COP)</h4>
                                <p class="mb-2 pb-75">The Communication on Progress (COP) is a mandatory report published by companies that are UN Global Compact participants. A COP demonstrates a participant’s advancements against the 10 Principles of the Global Compact and reiterates a strategic commitment to abide by those principles. Companies that do not publish a COP within two years in a row are delisted from the list of Global Compact participants. </p>
                            </div>
                            <div class="search_content">
                                <h4>Composting Rate</h4>
                                <p class="mb-2 pb-75">The composting rate is equal to [(tonnage of source-separated organic materials collected for composting)/(tonnage of waste generated, composted, recycled, disposed)]. [Source: www.epa.gov] </p>
                            </div>
                            <div class="search_content">
                                <h4>Compressed Natural Gas (CNG)</h4>
                                <p class="mb-2 pb-75">Compressed natural gas (CNG) is a readily available alternative to gasoline that is made by compressing natural gas to less than 1% of its volume at standard atmospheric pressure. Consisting mostly of methane, CNG is odorless, colorless and tasteless. It is drawn from domestically drilled natural gas wells or in conjunction with crude oil production. It costs about 50% less than gasoline or diesel, emits up to 90% fewer emissions than gasoline, and currently is in abundance in many countries. </p>
                            </div>
                            <div class="search_content">
                                <h4>Conflict Minerals</h4>
                                <p class="mb-2 pb-75">Conflict minerals are minerals originating from mines in the eastern region of the Democratic Republic of the Congo (DRC) and adjoining countries, which are prone to armed conflict and human rights abuses. There are four minerals of concern: Tungsten, Tantalum, Tin, and Gold (3T&G). They are commonly used in the production of various goods such as electronic devices, automobiles and jewelry. </p>
                            </div>
                            <div class="search_content">
                                <h4>Convention on International Trade in Endangered Species of Wild Fauna and Flora (CITES)</h4>
                                <p class="mb-2 pb-75">CITES (the Convention on International Trade in Endangered Species of Wild Fauna and Flora) is an international agreement between governments. Its aim is to ensure that international trade in specimens of wild animals and plants does not threaten their survival. CITES is an international agreement to which states adhere voluntarily and have to adopt their own domestic legislation to ensure that CITES is implemented at the national level. [Source: cites.org] </p>
                            </div>
                            <div class="search_content">
                                <h4>Corrective Action Plan</h4>
                                <p class="mb-2 pb-75">A corrective action plan is step-by-step plan of action and schedule for correcting a process issue in an organization. </p>
                            </div>
                            <div class="search_content">
                                <h4>Corruption (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Corruption is one of the EcoVadis criteria that assesses policies and measures taken by companies that deal with all forms of corruption issues at work, including, among other things, extortion, bribery, conflict of interest, fraud, money laundering. </p>
                            </div>
                            <div class="search_content">
                                <h4>CSR</h4>
                                <p class="mb-2 pb-75">Corporate Social Responsibility (or alternatively Corporate Citizenship or Corporate responsibility) is a “concept whereby companies voluntarily integrate economic, social and environmental concerns in their business operations and in interactions with their stakeholders on a voluntary basis”. [Source: European Commission] </p>
                            </div>
                            <div class="search_content">
                                <h4>Cullet Ratio</h4>
                                <p class="mb-2 pb-75">This ratio is the amount of recycled glass entering the manufacturing process reported to the amount of new materials (%). </p>
                            </div>
                            <div class="search_content">
                                <h4>Customers Health & Safety (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">The protection of customer/consumer health and safety is one of the criteria assessed by EcoVadis. It deals with the potential negative health and safety impacts of products and services on customers or consumers. </p>
                            </div>
                            <div class="search_content">
                                <h4>Data Life Cycle Management (DLCM)</h4>
                                <p class="mb-2 pb-75">Data Life Cycle Management (DLCM) is the process of managing business information throughout its lifecycle, from requirements through retirement. The lifecycle crosses different application systems, databases and storage media. By managing information properly over its lifetime, organizations are better equipped to reduce risks, reduce costs, and promote business agility. </p>
                            </div>
                            <div class="search_content">
                                <h4>Demand Management Policy</h4>
                                <p class="mb-2 pb-75">Demand management policies are policies that were argued to be used to control the level of demand in the economy. If there is a shortage of demand, governments should aim to boost demand, and when there is an excess demand, they should do the opposite. The government should be aiming to do the opposite of the trade cycle, and this strategy is used to prevent overheating of the economy or kick-start the economy if there is recession. </p>
                            </div>
                            <div class="search_content">
                                <h4>Direct Emissions</h4>
                                <p class="mb-2 pb-75">Direct emissions come from sources that are owned or controlled by the reporting organization. For example, direct emissions related to combustion would arise from burning fuel for energy within the reporting organization’s operational boundaries. </p>
                            </div>
                            <div class="search_content">
                                <h4>Discrimination (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Discrimination is defined as different treatment given to people in hiring, remuneration, access to training, promotion, termination or retirement based on race, caste, national origin, religion, disability, gender, sexual orientation, union membership, political affiliation or age. Discrimination is one of EcoVadis criteria which assesses policies and measures taken by companies to avoid and eliminate discrimination in the workplace. [Source: ILO Convention (No.111) Discrimination (Employment and Occupation)] </p>
                            </div>
                            <div class="search_content">
                                <h4>Diversity Charter</h4>
                                <p class="mb-2 pb-75">The Diversity Charter is a written commitment that can be signed by any company that wishes to ban discrimination in the workplace and improve the degree to which their workforce reflects the diversity of society. The French Diversity Charter’s six articles guide companies through the process of instituting new practices by involving all of their employees and partners in these actions. </p>
                            </div>
                            <div class="search_content">
                                <h4>Dumping</h4>
                                <p class="mb-2 pb-75">Dumping is a term used in the context of anti-competitive practices, and it occurs when goods are exported at a price lower than their normal value, generally meaning they are exported cheaper than they are sold in the domestic market or third-country markets, or at less than production cost. [Source: WTO]</p>
                            </div>
                            <div class="search_content">
                                <h4>Eco-design</h4>
                                <p class="mb-2 pb-75">Eco-design is an approach to design of products or processes with special consideration for the environmental impacts associated with a product during its whole lifecycle from acquisition of raw materials to end of life. Eco-design seeks to improve the aesthetic and functional aspects of the product with due considerations to social and ethical needs. Expression such as design for environment, green engineering, and sustainable product design can be used alternatively.</p>
                            </div>
                            <div class="search_content">
                                <h4>Eco-driving</h4>
                                <p class="mb-2 pb-75">Eco-driving is a driving style aiming at limiting CO2 emissions and fuel consumption in a more economical way. Techniques that drivers can use include for example slowing down and speed monitoring, reduction of idling emissions, and smooth acceleration</p>
                            </div>
                            <div class="search_content">
                                <h4>Eco-efficiency</h4>
                                <p class="mb-2 pb-75">Eco-efficiency is a concept that integrates economics and ecology. It implies creating more value (goods and services) with ever less impact (use of resources, waste and pollution). Eco-efficiency also involves finding new solutions through creativity and innovation. [Source: WBCSD] </p>
                            </div>
                            <div class="search_content">
                                <h4>Ecolabel</h4>
                                <p>Ecolabels are granted to consumer products by certificating agencies. They guarantee that the product has a mitigated impact on the environment and/or take into account social issues. </p>
                                <p>TYPE II: self-declared claims or marketing claims with no third-party certification, sometimes only controlled by misleading advertising laws </p>
                                <p class="mb-2 pb-75">TYPE III: quantified environmental data for a product with pre-set categories of parameters based on standards; provide data on key environmental aspects of products in a format that facilitates comparison of different products by purchasers [Source: www.globalecolabelling.net] </p>
                            </div>
                            <div class="search_content">
                                <h4>Eco-Management and Audit Scheme (EMAS)</h4>
                                <p class="mb-2 pb-75">The Eco-Management and Audit Scheme (EMAS) is the EU voluntary instrument which acknowledges organizations that evaluate, report, and improve their environmental performance on a continuous basis. EMAS III is comprised of six environmental core indicators including energy efficiency, material efficiency, water, waste, biodiversity, and GHG/air emissions. </p>
                            </div>
                            <div class="search_content">
                                <h4>Electrical and Electronic Equipments (EEE)</h4>
                                <p class="mb-2 pb-75">Electrical and Electronic Equipment (EEE) is defined as equipment which is dependent on electric currents or electromagnetic fields in order to work properly and equipment for the generation, transfer and measurement of such currents and fields. As a general rule, if it has a battery or needs a power supply to work properly, it is EEE and there are structures in place to reuse/recycle this equipment when it reaches end-of-life. </p>
                            </div>
                            <div class="search_content">
                                <h4>Electromagnetic Emission (EMR)</h4>
                                <p class="mb-2 pb-75">An electromagnetic emission or radiation (EMR) is a traveling wave motion resulting from changing electric or magnetic fields. Examples are gamma rays, x-rays, ultraviolet radiation, light, infrared radiation and radiofrequency radiation. The effect of electromagnetic radiation upon living cells, including those in humans, depends upon the power and the frequency of the radiation. For instance, the electromagnetic fields produced by mobile phones are classified by the International Agency for Research on Cancer as possibly carcinogenic to humans. [Source: WHO] </p>
                            </div>
                            <div class="search_content">
                                <h4>Electronic Product Environmental Assessment Tool (EPEAT)</h4>
                                <p class="mb-2 pb-75">The Electronic Product Environmental Assessment Tool (EPEAT) is a method for consumers, purchasers, manufacturers, and resellers to evaluate the effect of a product on the environment. It assesses lifecycle environmental standards and ranks products based on a set of environmental performance criteria. </p>
                            </div>
                            <div class="search_content">
                                <h4>Elemental chlorine free (ECF)</h4>
                                <p class="mb-2 pb-75">Elemental chlorine free (ECF) is a technique used in the paper industry. ECF papers are produced from pulp that has been bleached with a chlorine derivative such as chlorine dioxide (ClO2) instead of elemental chlorine gas which has a negative effect on the formation of dioxins and dioxin-like compounds. </p>
                            </div>
                            <div class="search_content">
                                <h4>Employee Health & Safety (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Employee health & safety is one of the EcoVadis criteria which assess measures taken by companies to mitigate the health and safety risks taken by employees. The criteria deals with health and safety issues encountered by employees at the workplace (e.g. during operations and transport). It includes both physiological and psychological issues arising from, among others, dangerous equipment, work practices and hazardous substances. </p>
                            </div>
                            <div class="search_content">
                                <h4>End Child Prostitution and Trafficking (ECPAT)</h4>
                                <p>The Code of Conduct for the Protection of Children from Sexual Exploitation in Travel and Tourism (EPCAT Code) addresses the tourism industry's responsibility in combating the sexual exploitation of children. </p>
                            </div>
                            <div class="search_content">
                                <h4>Endangered Species</h4>
                                <p class="mb-2 pb-75">Endangered species are species of plants and animals whose numbers have fallen to extremely low levels and which are in danger of extinction. The annually updated IUCN Red List of Threatened Species evaluates the conservation status of plant and animal species worldwide. </p>
                            </div>
                            <div class="search_content">
                                <h4>Energy Consumption & GHG (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">This EcoVadis criteria assesses the measures taken by companies to reduce energy consumption from operations and minimize emission of greenhouse gases. Energy consumption covers different type of energies (e.g. electricity, fuel, renewable energies) used during operations and transport. Greenhouse gases includes direct and indirect emissions including CO2, CH4, N2O, HFC, PFC and SF6. This criteria also includes the production of renewable energy by the company. </p>
                            </div>
                            <div class="search_content">
                                <h4>Energy Star</h4>
                                <p class="mb-2 pb-75">Energy Star is a US government program, which helps businesses and individuals protect the environment through superior energy efficiency. The standard was adopted in other countries (e.g. EU, New-Zealand and Australia). Devices carrying the Energy Star label can include computer products, kitchen appliances, buildings and other products. </p>
                            </div>
                            <div class="search_content">
                                <h4>Energy-Using Products (EuPs)</h4>
                                <p class="mb-2 pb-75">Energy-using products (EUPs) include products such as boilers, computers, televisions, transformers, industrial fans, industrial furnaces, which use, generate, transfer or measure energy (electricity, gas, fossil fuels). At the European Union level, the Energy-Using Products (EuP) Directive 2005/32/EC was recast in 2009 into the Eco-Design Directive (2009/125/EC). It establishes a framework to set mandatory ecological requirements for energy-using and energy-related products and covers more than 40 product groups. </p>
                            </div>
                            <div class="search_content">
                                <h4>Enhanced Environmentally Friendly Vehicle (EEV)</h4>
                                <p class="mb-2 pb-75">Enhanced environmentally friendly vehicle (EEV) is a term used in the European emission standards for the definition of a "clean vehicle" in the category of vehicles used for the carriage of passengers, comprising more than eight seats. The standard lies between the Euro V and Euro VI levels. </p>
                            </div>
                            <div class="search_content">
                                <h4>Environmental Impact Assessment (EIA)</h4>
                                <p class="mb-2 pb-75">An Environmental Impact Assessment (EIA) is the process of identifying, predicting, evaluating and mitigating the biophysical, social, and other relevant effects of development proposals prior to major decisions being taken and commitments made. </p>
                            </div>
                            <div class="search_content">
                                <h4>Environmental Management System (EMS)</h4>
                                <p class="mb-2 pb-75">An Environmental Management System (EMS) is a set of processes and practices that enable an organization to reduce its environmental impacts and increase its operating efficiency. </p>
                            </div>
                            <div class="search_content">
                                <h4>Environmental Product Declaration (EPD)</h4>
                                <p class="mb-2 pb-75">An environmental product declaration (EPD) is defined as "quantified environmental data for a product with pre-set categories of parameters based on the ISO 14040 series of standards, but not excluding additional environmental information". [Source: ISO Standard 14025] </p>
                            </div>
                            <div class="search_content">
                                <h4>Environmental Services & Advocacy (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Sustainable Consumption refers to programs implemented by a company to promote the sustainable consumption either of its own products or of services among its customer base. The criteria includes the positive/negative indirect impacts of the use of products and services. </p>
                            </div>
                            <div class="search_content">
                                <h4>Environmental, Social, and Governance (ESG)</h4>
                                <p class="mb-2 pb-75">ESG stands for Environmental, Social and Governance. This abbreviation is another term for corporate social responsibility. ESG was coined by financial analysts and investors in the Socially Responsible Investment field in order to include environmental and social aspects as well as corporate governance - alongside economic indicators - in business valuations. </p>
                            </div>
                            <div class="search_content">
                                <h4>Equator Principles (EPs)</h4>
                                <p class="mb-2 pb-75">The Equator Principles (EPs) are a credit risk management framework for determining, assessing and managing environmental and social risk in project finance transactions. </p>
                            </div>
                            <div class="search_content">
                                <h4>Ethical Trading Initiative (ETI)</h4>
                                <p class="mb-2 pb-75">The Ethical Trading Initiative (ETI) is a not-for-profit alliance of companies, trade unions, and voluntary organizations. Ethical trade means that retailers, brands, and their suppliers take responsibility for improving the working conditions of the people who make the products they sell. ETI's vision is a world where all workers are free from exploitation and discrimination, and enjoy conditions of freedom, security, and equity. [Source: ETI] </p>
                            </div>
                            <div class="search_content">
                                <h4>Ethylenediaminetetraacetic Acid (EDTA)</h4>
                                <p class="mb-2 pb-75">EDTA (ethylenediaminetetraacetic acid) is an amino acid compound used in various industries including textile, pulp and paper, food, and health. It is also used as a complexing agent in surface treatment and metal finishing. EDTA is now so overused that it is considered as a persistent organic pollutant. Left alone, it degrades eventually to ethylenediaminetriacetic acid, losing one acidic group and becoming toxic. </p>
                            </div>
                            <div class="search_content">
                                <h4>EU Batteries Directive</h4>
                                <p class="mb-2 pb-75">The EU Batteries Directive intends to contribute to the protection, preservation and improvement of the quality of the environment by minimizing the negative impact of batteries and accumulators. It also ensures the smooth functioning of the internal market by harmonizing market requirements, and it applies to almost all sizes, natures, and designs. The Directive prohibits the marketing of batteries containing some hazardous substances, defines schemes and targets aimed at collection and recycling, and sets out provisions on labelling. It also aims to improve the environmental performance of all operators involved in the life cycle of batteries and accumulators, as well as in the treatment and recycling of waste batteries and accumulators. </p>
                            </div>
                            <div class="search_content">
                                <h4>Euro III</h4>
                                <p>Euro III is a European emission standards for heavy duty vehicles that comply with the emission limits as defined in Directive 98/69/EC. </p>
                            </div>
                            <div class="search_content">
                                <h4>Euro IV</h4>
                                <p class="mb-2 pb-75">‘Euro IV’ heavy-duty vehicles must comply with the emission limits as defined in Directive 98/69/EC, which went into effect in 2005. ‘Euro IV’ vehicle emissions of carbon monoxide must not exceed 1.5 g/kWh, hydrocarbons &lt;0.46 g/kWh, nitrogen oxides &lt;3.5 g/kWh, particulates &lt;0.02 g/kWh, and exhaust gas &lt;0.5 m<sup>-1</sup>.</p>
                            </div>
                            <div class="search_content">
                                <h4>Euro V</h4>
                                <p class="mb-2 pb-75">‘Euro V’ heavy-duty vehicles must comply with the emission limits as defined in Regulation 715/2007, which went into effect in 2009 for light commercial vehicles. ‘Euro V’ vehicle emissions of carbon monoxide must not exceed 1.5 g/kWh, hydrocarbons &lt;0.46 g/kWh, nitrogen oxides &lt;2.0 g/kWh, particulates &lt;0.02 g/kWh, and exhaust gas &lt;0.5 m<sup>-1</sup>.</p>
                            </div>
                            <div class="search_content">
                                <h4>Euro VI</h4>
                                <p class="mb-2 pb-75">The upcoming Euro VI standards set air emission limits for heavy-duty vehicles (buses and trucks) as defined in Regulation (CE) No 595/2009. Euro VI emissions for new type approvals will apply starting on 31 December 2012 (and new registrations from 1 January 2014). ‘Euro VI’ vehicle emissions of carbon monoxide must not exceed 1.5 g/kWh, hydrocarbons &lt;0.13 g/kWh, nitrogen oxides &lt;0.4 g/kWh, particulates matter &lt;0.01 g/kWh.</p>
                            </div>
                            <div class="search_content">
                                <h4>European Association of Communications Agencies (EACA)</h4>
                                <p class="mb-2 pb-75">The European Association of Communications Agencies (EACA) is a Brussels-based organization whose mission is to represent full-service advertising and media agencies and agency associations in Europe. It aims to promote ethical advertising through standards, and awareness of the contribution of advertising in a free market economy and encourages close co-operation between agencies, advertisers and media in European advertising bodies.</p>
                            </div>
                            <div class="search_content">
                                <h4>European Ecolabel</h4>
                                <p class="mb-2 pb-75">EU Ecolabel helps to identify products and services that have a reduced environmental impact throughout their life cycle, from the extraction of raw material to production, use and disposal. Recognised throughout Europe, EU Ecolabel is a voluntary label promoting trusted, environmental excellence. EU Ecolabel products are evaluated by independent experts to ensure they meet criteria that reduce their environmental impact. </p>
                            </div>
                            <div class="search_content">
                                <h4>European Forum for Responsible Drinking (EFRD)</h4>
                                <p class="mb-2 pb-75">The European Forum for Responsible Drinking (EFRD) is an alliance of Europe’s leading spirits companies driving the industry’s commitment to promote responsible drinking in the EU and encouraging industry to adopt responsible self-regulatory standards for commercial communications. </p>
                            </div>
                            <div class="search_content">
                                <h4>European Promotional Products Association (EPPA)</h4>
                                <p class="mb-2 pb-75">The European Promotional Products Association (EPPA) was established in 1999 as an umbrella organisation for the European promotional product market. Its membership consists of associations representing suppliers (manufacturers, importers) and distributors (promotional product traders and consultants). EPPA's primary concern is to shape the basic political, social and economic conditions of the European promotional product market. Its current member companies, from 11 European countries, amount to over 8,000 businesses from the promotional product sector. </p>
                            </div>
                            <div class="search_content">
                                <h4>European Union Emissions Trading System (EU ETS)</h4>
                                <p class="mb-2 pb-75">The European Union Emissions Trading System (EU ETS) is a tool of the European Union's policy for reducing industrial greenhouse gas emissions and to combat climate change. It is the first and biggest international scheme for the trading of greenhouse gas emission allowances. The EU ETS covers some 11,000 power stations and industrial plants in 30 countries </p>
                            </div>
                            <div class="search_content">
                                <h4>European Union Timber Regulation (EUTR)</h4>
                                <p class="mb-2 pb-75">The European Union Timber Regulation puts obligations on businesses who trade in timber and timber-related products. It applies to timber originating in the domestic (EU) market, as well as from third (non-EU) countries. Operators and traders of timber each have a set of responsibilities including the implementation of a due diligence system, risk assessment, supplier record maintenance, etc. </p>
                            </div>
                            <div class="search_content">
                                <h4>European Works Council (EWC)</h4>
                                <p class="mb-2 pb-75">A European Works Council (EWC) is a body that communicates information from management to employees. The EWC ensures that decisions that are made in one participating state that affect the employees in another participating state will be communicated to all workers. The European Work Council Directive (94/45/EC) gives representatives of workers from all European countries in large multinational companies a direct line of communication to top management. It applies to all companies with 1,000 or more workers, and at least 150 employees in each of two or more EU Member States. </p>
                            </div>
                            <div class="search_content">
                                <h4>E-Waste</h4>
                                <p class="mb-2 pb-75">E-Waste for short - or Waste Electrical and Electronic Equipment (WEEE) - is the term used to describe old, end-of-life or discarded electronic appliances. It includes computers, consumer electronics, refrigerators, etc which have been disposed by their original users (by extension, all types of waste containing electrically powered components). E-Waste contains both valuable materials as well as hazardous materials which require special handling and recycling methods. </p>
                            </div>
                            <div class="search_content">
                                <h4>Extractive Industries Transparency Initiative (EITI)</h4>
                                <p class="mb-2 pb-75">The Extractive Industries Transparency Initiative (EITI) is a coalition of governments, companies, civil society groups, investors and international organizations that supports improved governance in resource-rich countries through the verification and publication of company payments and government revenues from oil, gas and mining. Businesses from the extractives sector (but not exclusively) can become ‘Supporting Companies’. </p>
                            </div>
                            <div class="search_content">
                                <h4>Fair Business Practices (EcoVadis methodology)</h4>
                                <p class="mb-2 pb-75">Fair business practices concern ethical conduct in an organization's dealings with other organizations. Fair business practice issues arise in the areas of anti-corruption, responsible involvement in the public sphere, fair competition, socially responsible behavior, relations with other organizations and respect for property rights. Ethics is one of EcoVadis four themes, which assesses measures taken by companies to avoid and eliminate corruption, bribery and anti-competitive practices, protect property rights and ensure the truthfulness of marketing messages. [Source: ISO 26000] </p>
                            </div>
                            <div class="search_content">
                                <h4>Fair Labor Association (FLA)</h4>
                                <p class="mb-2 pb-75">The Fair Labor Association (FLA) is a non-profit organization that aims to protect workers’ rights and improve working conditions worldwide by promoting international labor standards in supply chains. Companies that join the FLA commit to upholding the FLA Workplace Code of Conduct, which is based on International Labour Organization standards, and to establishing internal systems for monitoring workplace conditions and maintaining code standards throughout their supply chains. The FLA monitors factories all over the world through performance reviews, verification of remediation initiatives, and an evaluation of internal protocols and auditing, as well as training. </p>
                            </div>
                            <div class="search_content">
                                <h4>Fair Trade</h4>
                                <p class="mb-2 pb-75">The term Fair Trade defines “a trading partnership, based on dialogue, transparency and respect, that seeks greater equity in international trade. It contributes to sustainable development by offering better trading conditions to, and securing the rights of, marginalized producers and workers – especially in developing countries.” Fair Trade ensures that producers in poor countries get a fair price for their goods (one which covers production costs and provides a living income), decent working terms and conditions and longer term contracts that provide security. [Source: FairTrade International] </p>
                            </div>
                            <div class="search_content">
                                <h4>Forced Labor (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">The International Labor Organisation defines forced or compulsory labor as “all work or service which is exacted from any person under the menace of any penalty and for which the said person has not offered himself voluntarily” (e.g. service is demanded as a means of repayment of debt). Forced labor also includes all form of slave labor. Forced labor is one of EcoVadis criteria, which assesses measures taken by companies to avoid and eliminate forced labor. [Source: C29 Forced Labor Convention, 1930] </p>
                            </div>
                            <div class="search_content">
                                <h4>Foreign Corrupt Practices Act of 1977 (FCPA)</h4>
                                <p class="mb-2 pb-75">The Foreign Corrupt Practices Act of 1977 (FCPA) is a United States federal law that prohibits U.S. corporations from offering or paying anything of value to a “foreign official” in order to obtain or retain business or gain a business advantage. Corporations under national and international jurisdiction of the FCPA are the ones that issue securities registered in the United States or who are required to file periodic reports with the Securities & Exchange Commission (SEC), Foreign Companies with ADRs listed on U.S. exchanges, U.S. based private companies, and employees of these entities </p>
                            </div>
                            <div class="search_content">
                                <h4>Forest Law Enforcement, Governance and Trade (FLEGT)</h4>
                                <p class="mb-2 pb-75">The European Union's FLEGT Action Plan was established in 2003. It aims to reduce illegal logging by strengthening sustainable and legal forest management, improving governance and promoting trade in legally produced timber. The Action Plan sets out measures to prevent the import of illegal timber into the EU, improve the supply of legal timber, and increase demand for timber from responsibly managed forests. </p>
                            </div>
                            <div class="search_content">
                                <h4>Forest Stewardship Council (FSC)</h4>
                                <p class="mb-2 pb-75">The Forest Stewardship Council (FSC) is an international not for-profit organization, which promotes responsible management of the world’s forests by directly or indirectly addressing issues such as illegal logging and deforestation. The FSC offers certification and labeling scheme of forest products. FSC accredited certification bodies certify and audit each individual forest management operation. FSC chain of custody (CoC) tracks FSC certified material through the production process including all stages of processing, transformation, manufacturing and distribution. </p>
                            </div>
                            <div class="search_content">
                                <h4>Fossil Fuels</h4>
                                <p class="mb-2 pb-75">Fossil fuels are comprised of carbon-based fuels, such as coal, natural gas and petroleum, derived from the decomposed remains of ancient plants and animals, usually underground or in the ocean floor, where they have been under pressure for millions of years. Fossil fuels release carbon dioxide when burned. </p>
                            </div>
                            <div class="search_content">
                                <h4>Freedom of Association</h4>
                                <p class="mb-2 pb-75">Workers and employers may establish and join organizations of their own choosing without the need for prior authorization. </p>
                            </div>
                            <div class="search_content">
                                <h4>FTSE4GOOD Index Series</h4>
                                <p class="mb-2 pb-75">The FTSE4Good Index Series, which comprises a range of stock market indices, benchmarks the performance of companies that meet globally recognized corporate responsibility standards. [Source: FTSE] </p>
                            </div>
                            <div class="search_content">
                                <h4>Gas to Liquid (GTL)</h4>
                                <p class="mb-2 pb-75">Gas to Liquid (GTL) is a refinery process to create liquid fuels such as kerosene and light oil through a chemical reaction with natural gas. The process is still energy consuming but the environmental footprint of synthetic fuels could be improved. </p>
                            </div>
                            <div class="search_content">
                                <h4>Genetically Modified Organisms (GMOs)</h4>
                                <p class="mb-2 pb-75">Genetically modified organisms (GMOs) can be defined as organisms in which the genetic material (DNA) has been altered in a way that does not occur naturally by mating or natural recombination. The most common types of GMOs that have been developed and commercialized are genetically modified crop plant species, such as genetically modified corn, soybean, oilseed rape and cotton varieties. In Europe, six Member States are currently applying safeguard clauses on GMO events: Austria, France, Greece, Hungary, Germany and Luxembourg. </p>
                            </div>
                            <div class="search_content">
                                <h4>Global e-Sustainability Initiative (GESI)</h4>
                                <p class="mb-2 pb-75">The Global e-Sustainability Initiative (GeSI) is an industry trade association founded in 2001. It aims to further sustainable development in the ICT sector and fosters global and open cooperation, informs the public of its members’ voluntary actions to improve their sustainability performance, and promotes innovative technologies. GeSI’s Electronics Tool for Accountable Supply Chains (E-TASC) is a web-based tool utilized by companies to manage their own factories, communicate with their customers, and assess their suppliers on corporate responsibility risks. </p>
                            </div>
                            <div class="search_content">
                                <h4>Global Harmonized System (GHS)</h4>
                                <p class="mb-2 pb-75">The Globally Harmonized System of Classification and Labelling of Chemicals is a system for standardizing and harmonizing the classification and labelling of chemicals. Created by the UN and ILO, it is a comprehensive approach to: defining health, physical, and environmental hazards of chemicals; creating classification processes that use available data on chemicals for comparison with the defined hazard criteria; and communicating hazard information, as well as protective measures, on labels and Safety Data Sheets (SDS). </p>
                            </div>
                            <div class="search_content">
                                <h4>Global Packaging Project (GPP)</h4>
                                <p class="mb-2 pb-75">The Global Packaging Project (GPP) by the Consumer Goods Forum is a voluntary effort by some of the largest global retailers and brand owners to develop a common language and common measurement system to communicate and share information about packaging and sustainability. </p>
                            </div>
                            <div class="search_content">
                                <h4>Global Product Strategy (GPS)</h4>
                                <p class="mb-2 pb-75">The International Council of Chemical Associations (ICCA) launched the Global Product Strategy (GPS), in 2006, to advance the product stewardship performance of individual companies and the global chemical industry as a whole. The overall objective of this policy framework is that by 2020, chemicals are produced and used in ways that minimize significant adverse impacts on human health and the environment. The GPS is designed to improve the global chemical industry's product stewardship performance by recommending measures to be taken by companies, working together with other companies and associations along the chemical value chain. It builds on the product stewardship elements of industry’s voluntary Responsible Care initiative and aims to improve the safe management of chemicals. </p>
                            </div>
                            <div class="search_content">
                                <h4>Global Reporting Initiative (GRI)</h4>
                                <p class="mb-2 pb-75">The Global Reporting Initiative (GRI) produces a sustainability reporting framework to enhance organizational transparency. The Framework, including the Reporting Guidelines, sets out the Principles and Indicators organizations can use to report their economic, environmental, and social performance. The GRI’s mission is to make sustainability reporting by all organizations as routine and comparable as financial reporting. The GRI proposes more than 50 core indicators and additional indicators can be found in the Sector Supplements. It also provides a range of indicators which help define an organization’s sustainability context and reporting quality. GRI reports can be third party audited (e.g. A+ level) or self-declared (e.g. B level). </p>
                            </div>
                            <div class="search_content">
                                <h4>Global Warming Potential (GWP)</h4>
                                <p class="mb-2 pb-75">The global warming potential (GWP) is an indicator that allows the comparison of the ability of each greenhouse gas to trap heat in the atmosphere relative to carbon dioxide (CO2) over a specified time horizon. </p>
                            </div>
                            <div class="search_content">
                                <h4>Good Agricultural Practices (GAP)</h4>
                                <p class="mb-2 pb-75">Good Agricultural Practices (GAP) are practices that address environmental, economic and social sustainability for on-farm processes, and result in safe and quality food and non-food agricultural products. General principles for GAP were first presented to the Food and Agriculture Organization of the United Nations (FAO) Committee on Agriculture (COAG) in 2003 in a report documenting 'Development of a Framework for Good Agricultural Practices'. </p>
                            </div>
                            <div class="search_content">
                                <h4>Good Manufacturing Practice (GMP)</h4>
                                <p class="mb-2 pb-75">The Good manufacturing practice (GMP) guidelines are production and testing procedures used in the medicinal and pharmaceutical industry. The GMPs have been established by many national legislations to ensure a quality of products. </p>
                            </div>
                            <div class="search_content">
                                <h4>Green Certificates</h4>
                                <p class="mb-2 pb-75">Green Certificates or Renewable Energy Certificates (RECs) are a tradable commodity proving that certain electricity is generated using renewable energy sources. Green Certificates provide key information about the generation of renewable electricity delivered to the utility grid. Buyers can select Green certificates based on the generation resource (e.g., wind, solar, geothermal). </p>
                            </div>
                            <div class="search_content">
                                <h4>Green Energy</h4>
                                <p class="mb-2 pb-75">Green energy includes those that help the earth meet energy needs without depleting the ability to serve in the long term. This can include some types of renewable energies, but renewable energy includes all natural sources of energy which can be replaced by natural ecological cycles. Energy from the sun, wind, or earth's heat can be characterized as green energy but are renewable as they do not have economic impacts and are unlimited. </p>
                            </div>
                            <div class="search_content">
                                <h4>Green IT</h4>
                                <p class="mb-2 pb-75">Green information technology (IT) refers to the implementation of environmentally sound information technology, through the use of practices such as designing, manufacturing, using, and disposing of computers, servers, and associated subsystems efficiently and effectively so as to minimize or eliminate environmental impacts. It can also include such practices as the use of renewable energy sources for IT purposes, server virtualization, optimized data centers, energy-efficient computing, ecolabelling of IT products, etc. </p>
                            </div>
                            <div class="search_content">
                                <h4>Green Neighborhood</h4>
                                <p class="mb-2 pb-75">Urban development project integrating sustainable development objectives, and accepting high level of environmental responsibilities. </p>
                            </div>
                            <div class="search_content">
                                <h4>Green Seal</h4>
                                <p class="mb-2 pb-75">Green Seal is a U.S. non-profit, third-party certifier and standards development body. The Green Seal certification ensures that a product meets rigorous, science-based environmental leadership standards. Through its eco-labeling scheme, Green Seal gives manufacturers the assurance to back up their claims and purchasers confidence that certified products are better for human health and the environment. </p>
                            </div>
                            <div class="search_content">
                                <h4>Greenhouse Gas (GHG)</h4>
                                <p class="mb-2 pb-75">Greenhouse gases (GHGs) are components of the atmosphere that contribute to the greenhouse effect. Components include CO2, CH4, N2O, HFC, PFC, SF6, which have different global warming potentials (GWP). </p>
                            </div>
                            <div class="search_content">
                                <h4>Greenhouse Gas Protocol (GHG Protocol)</h4>
                                <p>The Greenhouse Gas Protocol (GHG Protocol) is an international accounting tool for greenhouse gas emissions. It is the result of a partnership between the World Resources Institute (WRI) and the World Business Council for Sustainable Development (WBCSD). </p>
                                <ul class="mb-2 pb-75">
                                    <li>Scope 1: All direct GHG emissions. </li>
                                    <li> Scope 2: Indirect GHG emissions from consumption of purchased electricity, heat or steam. </li>
                                    <li>Scope 3: Other indirect emissions, such as the extraction and production of purchased materials and fuels, outsourced activities, waste disposal, etc. </li>
                                </ul>
                            </div>
                            <div class="search_content">
                                <h4>Greenpeace Cool IT Challenge Leaderboard</h4>
                                <p class="mb-2 pb-75">The Cool IT Leaderboard, issued by Greenpeace International and launched in 2009, establishes a scoring system that analyzes IT companies' contributions to achieving global greenhouse gas emissions reductions of 15 percent by 2020. It is updated annually and tracks the progress of the largest IT brands in three key areas: technological climate solutions, global warming emissions, engagement in political advocacy. [Source: Greenpeace] </p>
                            </div>
                            <div class="search_content">
                                <h4>Greenwashing</h4>
                                <p class="mb-2 pb-75">Greenwashing is an overstated, misleading claim about the environmental and social benefits of a product, service or technology offered by a firm. For example, a corporation can promote green-based environmental initiatives but actually operate in a way that is detrimental to the environment. </p>
                            </div>
                            <div class="search_content">
                                <h4>Greywater</h4>
                                <p class="mb-2 pb-75">Greywater is gently used water from sinks, showers, tubs, and washing machines, but that has not come into contact with hazardous or fecal materials. Greywater may contain traces of dirt, food, grease, hair, and certain materials as a result of various processes. Reusing greywater can be a sustainable water management practice, as keeping it out of the sewer or septic system, can reduce local pollution of water bodies. </p>
                            </div>
                            <div class="search_content">
                                <h4>Guidelines on Sustainability for the Chemical Industry in Germany</h4>
                                <p class="mb-2 pb-75">The Sustainability Initiative of the German Chemical Industry Chemie is based on twelve sustainability guidelines which aim to underpin sustainability as a guiding principle of the chemical industry in this country. As a sector-specific umbrella, the guidelines provide orientation for enterprises and their workforces. </p>
                            </div>
                            <div class="search_content">
                                <h4>Halogenated compounds</h4>
                                <p class="mb-2 pb-75">Halogenated compounds (or organic halides) are non-metal compounds such as including fluorine, chlorine, bromine, iodine, and astatine. The more halogenated a chemical compound (i.e., the more halogens attached to it), the more resistant it is to biodegradation. Halogenated compounds are used in solvents, plastic and polymer intermediates, insecticides, fumigants, refrigerants, additives for gasoline, and materials used in fire extinguishers. </p>
                            </div>
                            <div class="search_content">
                                <h4>Hazard Analysis and Critical Control Points (HACCP)</h4>
                                <p class="mb-2 pb-75">Hazard Analysis and Critical Control Points (HACCP) is a quality management system in which food and pharmaceuticals safety is addressed through the analysis and control of biological, chemical, and physical hazards from raw material production, procurement and handling, to manufacturing, distribution and consumption of the finished product. [Source: U.S. FDA] </p>
                            </div>
                            <div class="search_content">
                                <h4>Heavy Metals</h4>
                                <p class="mb-2 pb-75">Heavy metals are metals and metal compounds with high molecular weights, often resulting from industrial processes (batteries, televisions, paints, ink) and generally toxic to animal life and human health if naturally occurring concentrations are exceeded. Examples include arsenic, chromium, lead, and mercury. </p>
                            </div>
                            <div class="search_content">
                                <h4>Hexavalent Chromium</h4>
                                <p class="mb-2 pb-75">Hexavalent chromium is usually produced by an industrial process and is known to cause cancer. In addition, it targets the respiratory system, kidneys, liver, skin and eyes. Chromium metal is added to alloy steel to increase hardenability and corrosion resistance. A major source of worker exposure occurs during "hot work" such as welding on stainless steel and other alloy steels containing chromium metal. Hexavalent chromium compounds may be used as pigments in dyes, paints, inks, and plastics. It also may be used as an anticorrosive agent added to paints, primers, and other surface coatings. </p>
                            </div>
                            <div class="search_content">
                                <h4>High Production Volume Information System (HPVIS)</h4>
                                <p class="mb-2 pb-75">The High Production Volume Information System (HPVIS) is a database that provides access to health and environmental effects of chemicals produced or imported into the United States in quantities of 1 million pounds or more per year. </p>
                            </div>
                            <div class="search_content">
                                <h4>High Quality Environmental Standard (HQE)</h4>
                                <p class="mb-2 pb-75">Heavy metals are metals and metal compounds with high molecular weights, often resulting from industrial processes (batteries, televisions, paints, ink) and generally toxic to animal life and human health if naturally occurring concentrations are exceeded. Examples include arsenic, chromium, lead, and mercury.The High Quality Environmental standard (HQE) is a standard for green building in France. The standard specifies criteria for outdoor environmental impacts (e.g. nuisance by the construction sites, waste minimization, water management, energy use) and indoor environment quality (e.g. acoustic control measures, hygiene and cleanliness, ambient air, water controls). </p>
                            </div>
                            <div class="search_content">
                                <h4>Human Rights (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">It is one of EcoVadis criteria which assesses policies and measures taken by companies to deal with fundamental human rights issues at work. This includes the respect of security, property rights, employees privacy rights, civil and political rights, rights to freedom of association and collective bargaining, social and cultural rights (including indigenous people) as well as the prevention of harassment, moral and physical violence and inhumane or degrading treatment. </p>
                            </div>
                            <div class="search_content">
                                <h4>Human Rights Impact Assessment (HRIA)</h4>
                                <p class="mb-2 pb-75">A Human Rights Impact Assessment (HRIA) is a process for systematically identifying, predicting and responding to the potential human rights impacts of the policies, practices, procedures and priorities of government, public and private bodies. </p>
                            </div>
                            <div class="search_content">
                                <h4>Hydrochlorofluorocarbons (HCFC)</h4>
                                <p class="mb-2 pb-75">Hydrochlorofluorocarbons or HCFCs are organic gases used as refrigerants and propellants in aerosols. They are greenhouse gases with high global warming potential (124 to 14,800 times C02 emissions depending of the specific type of gas). Under the Montreal Protocol on Substances that Deplete the Ozone Layer, parties have agreed to set year 2013 as the time to freeze the consumption and production of HCFCs. </p>
                            </div>
                            <div class="search_content">
                                <h4>ILO-OSH 2001</h4>
                                <p class="mb-2 pb-75">ILO-OSH 2001 guidelines call for coherent policies to protect workers from occupational hazards and risks while improving productivity. They present practical approaches and tools for assisting organizations, competent national institutions, employers, workers and other social partners in establishing, implementing and improving occupational safety and health management systems, with the aim of reducing work-related injuries, ill health, diseases, incidents and deaths. [Source: ILO] </p>
                            </div>
                            <div class="search_content">
                                <h4>Imprim'Vert</h4>
                                <p class="mb-2 pb-75">Imprim'Vert is a French ecolabel which outlines environmental specifications for the printing industry. To use the trademark, printers must follow specifications that cover waste, toxic products, hazardous liquids and energy use. A third party, Pôle d'Innovation de l'Imprimerie, verifies the specifications are upheld by the printing companies. </p>
                            </div>
                            <div class="search_content">
                                <h4>Indirect Emissions</h4>
                                <p class="mb-2 pb-75">Emissions that result from the activities of the reporting organization but are generated at sources owned or controlled by another organization. In the context of this Indicator, indirect emissions refer to greenhouse gas emissions from the generation of electricity, heat, or steam that is imported and consumed by the reporting organization. </p>
                            </div>
                            <div class="search_content">
                                <h4>Industrial Ecology</h4>
                                <p class="mb-2 pb-75">Industrial Ecology is a field of study in which manufacturing systems are approached taking into consideration available material and energy flows and natural resources. For example, resource and capital investments are studied in a closed loop system where waste become input for new processes. </p>
                            </div>
                            <div class="search_content">
                                <h4>Insider Trading</h4>
                                <p class="mb-2 pb-75">Insider trading occurs when someone makes an investment decision based on information that is not available to the general public. In some cases, the information allows them to profit, in others, to avoid a loss. </p>
                            </div>
                            <div class="search_content">
                                <h4>Integrated Multi-Trophic Aquaculture (IMTA)</h4>
                                <p class="mb-2 pb-75">Integrated multi-trophic aquaculture is a way to improve the productivity and environmental sustainability of marine aquaculture practices, through examining the economic and environmental benefits of growing fish, shellfish, and marine plants together. IMTA borrows its concept from nature; namely, that in the food chain, one species always finds a feeding niche in the waste generated by another species. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Association for Soaps, Detergents, and Maintenance Products (AISE) Charter for Sustainable Cleaning</h4>
                                <p class="mb-2 pb-75">This charter is a voluntary initiative of the European soaps, detergents and maintenance products industry. It provides a lifecycle analysis (LCA) based framework. It promotes and facilitates a common industry approach to sustainability practice and reporting. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Chamber of Commerce Charter on Sustainable Development</h4>
                                <p class="mb-2 pb-75">The International Chamber of Commerce (ICC) Business Charter for Sustainable Development consists of 16 principles on environmental management. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Chamber of Commerce International Code of Advertising Practice</h4>
                                <p class="mb-2 pb-75">The International Chamber of Commerce (ICC) Code of Advertising practices promotes high standards of ethics in marketing and is intended to complement the existing frameworks of national and international law. The Code applies to all advertisements for the promotion of any form of goods and services </p>
                            </div>
                            <div class="search_content">
                                <h4>International Civil Aviation Organization (ICAO)</h4>
                                <p class="mb-2 pb-75">The International Civil Aviation Organization (ICAO) is a UN specialized agency, created in 1944 upon the signing of the Convention on International Civil Aviation (Chicago Convention). ICAO works with the Convention’s 191 Member States and global aviation organizations to develop international Standards and Recommended Practices (SARPs) which States reference when developing their legally-enforceable national civil aviation regulations. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Council of Toy Industries Code of Business Practices</h4>
                                <p class="mb-2 pb-75">The International Council of Toy Industries (ICTI) Code of Business Practices establishes commitments for toy factories regarding labor and human rights issues. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Food Standard (IFS)</h4>
                                <p class="mb-2 pb-75">The International Food Standard (IFS) is a standard based on the auditing of food processing companies or companies that pack loose food products. It covers among others the HACCP system, personnel hygiene, protective clothing, and pest control. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Labor Organization (ILO)</h4>
                                <p class="mb-2 pb-75">The International Labor Organization (ILO) is a specialized agency of the United Nations that deals with labor issues. The ILO organization seeks to promote employment creation, strengthen fundamental principles and rights at work - workers' rights, improve social protection, and promote social dialogue as well as provide relevant information, training and technical assistance. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Maritime Organization Conventions</h4>
                                <p class="mb-2 pb-75">The conventions from the International Maritime Organization (IMO), a United Nations agency, aim at improving maritime safety and preventing marine environmental pollution. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Partnership for Premiums and Gifts (IPPAG)</h4>
                                <p class="mb-2 pb-75">The International Partnership for Premiums and Gifts (IPPAG) is an initiative led by private company IPPAG Global Promotions, based in Switzerland. The company provides full service global solutions for promotional items, with global, regional and national account management and expertise. IPPAG has introduced and implemented a Code of Conduct for IPPAG Members, which include gifts and promotional item wholesalers. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Safety Management (ISM)</h4>
                                <p class="mb-2 pb-75">The purpose of the International Safety Management Code is to provide an international standard for the safe management of ships and for pollution prevention. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Ship and Port Facility Security (ISPS)</h4>
                                <p class="mb-2 pb-75">The International Ship and Port Facility Security (ISPS) Code came into force in 2004 for all ships. It is a comprehensive set of measures to enhance the security of ships and port facilities. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Standard Organization (ISO)</h4>
                                <p class="mb-2 pb-75">ISO stands for the International Standard Organization, an international standard-setting body composed of representatives from various national standards organizations. It is responsible for the ISO 9000, ISO 14000, ISO 50001, ISO 27000, ISO 22000 and other international management standards. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Sustainability and Carbon Certification (ISCC)</h4>
                                <p class="mb-2 pb-75">International Sustainability and Carbon Certification (ISCC) is one of the leading certification systems for sustainability and greenhouse gas emissions. It is one of the first certification schemes to demonstrate compliance with the EU Renewable Energy Directive’s (RED) requirements. ISCC can be applied to meet legal requirements in the bioenergy markets as well as to demonstrate the sustainability and traceability of feedstock in the food, feed and chemical industries. [Source: ISCC] </p>
                            </div>
                            <div class="search_content">
                                <h4>International Tin Research Industry Tin Supply Chain Initiative (ITRI iTSCi)</h4>
                                <p class="mb-2 pb-75">iTSCi is a joint initiative that assists upstream companies (from mine to the smelter) to institute the actions, structures, and processes necessary to conform with the OECD Due Diligence Guidance (DDG) at a very practical level, including small and medium size enterprises, co-operatives and artisanal mine sites. It is designed for use by industry, but with oversight and clear roles for government officials, in keeping with the recently published OECD Due Diligence Guidance for Responsible Supply Chains of Minerals from Conflict-Affected and High-Risk Area. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Uniform Chemical Information Database (IUCLID5)</h4>
                                <p class="mb-2 pb-75">The International Uniform Chemical Information Database (IUCLID) is a software application to capture, store, maintain and exchange data on intrinsic and hazard properties of chemical substances. The current version of the software is IUCLID5, compliant with REACH obligations. </p>
                            </div>
                            <div class="search_content">
                                <h4>International Union for the Conservation of Nature and Natural Resources (IUCN)</h4>
                                <p class="mb-2 pb-75">The International Union for the Conservation of Nature and Natural Resources (IUCN) is a global environmental organization aimed at finding solutions to pressing environmental and development challenges through supporting scientific research, managing field projects, valuing and conserving nature, and helping governments, NGOs, the UN, and companies come together to create best practice policies. The IUCN's Red List is an inventory of the global conservation status of plant and animal species. [Source: IUCN] </p>
                            </div>
                            <div class="search_content">
                                <h4>Inventory of Existing Chemical Substances Produced or Imported in China (IECSC)</h4>
                                <p class="mb-2 pb-75">This inventory was created by the Chemical Inspection & Regulation Service (CIRS) and entails over 45,000 chemical substances, updated by the Chinese government. It was originally set up to provide REACH compliance services to the Chinese chemical industry, through new substance notification, registration of import/export of chemicals, registration of chemicals, labeling and classification, etc. </p>
                            </div>
                            <div class="search_content">
                                <h4>Ionizing Radiation</h4>
                                <p class="mb-2 pb-75">The Cool IT Leaderboard, issued by Greenpeace International and launched in 2009, establishes a scoring system that analyzes IT companies' contributions to achieving global greenhouse gas emissions reductions of 15 percent by 2020. It is updated annually and tracks the progress of the largest IT brands in three key areas: technological climate solutions, global warming emissions, engagement in political advocacy. [Source: Greenpeace] </p>
                            </div>
                            <div class="search_content">
                                <h4>ISO 13485</h4>
                                <p class="mb-2 pb-75">The ISO 13485 standard specifies requirements for a quality management system where an organization needs to demonstrate its ability to provide medical devices and related services that consistently meet customer requirements and regulatory requirements applicable to medical devices and related services. [Source: ISO] </p>
                            </div>
                            <div class="search_content">
                                <h4>ISO 14001</h4>
                                <p class="mb-2 pb-75">The ISO 14001 standard belongs to the ISO 14000 series, a family of environmental management standards developed by the International Organization for Standardization (ISO) designed to provide an internationally recognized framework for environmental management, measurement, evaluation and auditing. The ISO 14001 standard serves as a framework to assist organizations in developing their own environmental management system and is based on the continuous Plan-Check-Do-Review-Improve cycle. </p>
                            </div>
                            <div class="search_content">
                                <h4>ISO 14040</h4>
                                <p class="mb-2 pb-75">ISO 14040 series concern life cycle assessments, pre-production planning, and environment goal setting. </p>
                            </div>
                            <div class="search_content">
                                <h4>ISO 22000</h4>
                                <p class="mb-2 pb-75">ISO 22000 is an international standard, dealing with food safety. It is applicable to all organisms along the food chain. </p>
                            </div>
                            <div class="search_content">
                                <h4>ISO 22628</h4>
                                <p class="mb-2 pb-75">This International Standard specifies a method for calculating the recyclability rate and the recoverability rate of a new road vehicle, each expressed as a mass fraction of the vehicle. Under this procedure, performed by the vehicle manufacturer when a new road vehicle is put on the market, potentially, the vehicle can be recycled, reused or both (recyclability rate), or recovered, reused or both (recoverability rate). [Source: ISO] </p>
                            </div>
                            <div class="search_content">
                                <h4>ISO 27001</h4>
                                <p class="mb-2 pb-75">ISO 27001 is an Information Security Management System (ISMS) standard. The standard specifies the requirements for establishing, implementing, operating, monitoring, reviewing, maintaining and improving a documented Information Security Management System within the context of the organization's overall business risks. </p>
                            </div>
                            <div class="search_content">
                                <h4>ISO 28000</h4>
                                <p class="mb-2 pb-75">The norm ISO 28000 specifies the requirements for a security management system, including those aspects critical to security assurance of the supply chain. Security management is linked to many other aspects of business management. Aspects include all activities controlled or influenced by organizations that impact on supply chain security, also where and when they have an impact on security management, including transporting these goods along the supply chain. [Source: ISO] </p>
                            </div>
                            <div class="search_content">
                                <h4>ISO 50001</h4>
                                <p class="mb-2 pb-75">ISO 50001 specifies requirements for establishing, implementing, maintaining and improving an energy management system, whose purpose is to enable an organization to follow a systematic approach in achieving continual improvement of energy performance, including energy efficiency, energy use and consumption. </p>
                            </div>
                            <div class="search_content">
                                <h4>Japan Electronics and Information Technology Industries Association (JEITA) Responsible Minerals Trade Working Group </h4>
                                <p class="mb-2 pb-75">JEITA has been engaged in promoting CSR throughout the supply chain in the IT and electronics industries. JEITA formally set up the Responsible Minerals Trade Working Group to achieve responsible sourcing of minerals and to deal with the Dodd-Frank Act and other regulations. Actions of the group include planning and implementation of reasonable and effective policies in the interest of JEITA members and cost efficiency, as well as strive to improve Japanese companies' presence in the international society through collaborations with other initiatives (such as EICC and GeSI). </p>
                            </div>
                            <div class="search_content">
                                <h4>Joint Labor Management Health and Safety Committee</h4>
                                <p class="mb-2 pb-75">A joint labor management health and safety committee intervenes in the field of the health and safety of employees. It is comprised of employer representatives, employees representatives and specialists of health and safety issues. </p>
                            </div>
                            <div class="search_content">
                                <h4>Key Performance Indicator (KPI)</h4>
                                <p class="mb-2 pb-75">A Key Performance Indicator (KPI) is a quantifiable business metrics used to define performance against objectives and targets. KPIs also serve as an alert system for possible deviations from pre-established performance goals. For example, KPIs can help companies monitor their performance within the framework of a sustainability management system. KPIs can vary from company to company, depending on the strategy and sector, however standardized sustainability KPIs exist as defined by internationally recognized organizations such as the Global Reporting Initiative. </p>
                            </div>
                            <div class="search_content">
                                <h4>Keyline Design®</h4>
                                <p class="mb-2 pb-75">Keyline Design is a system used to build and regenerate degraded soils rapidly, especially when integrated with holistically managed grazing, and can play an important role in maintaining our urban built environment. Developed in Australia in the 1950s, the system of contour subsoil ripping controls rainfall runoff and enables fast flood irrigation of undulating land without the need for terracing. They can include irrigation dams for stock water and farm water, earth channels to broaden the catchment areas of high dams, and ridge lines to provide additional catchment and non-erosive movement across the land. </p>
                            </div>
                            <div class="search_content">
                                <h4>Kyoto Protocol</h4>
                                <p class="mb-2 pb-75">The Kyoto Protocol is an international agreement linked to the United Nations Framework Convention on Climate Change. It sets out a series of reduction targets for industrialized nations to meet by 2012. Signatories that formally ratify the Kyoto Protocol will be legally bound to reduce their emissions below 1990 levels by an average of 5%. As of September 2011, 191 states have signed and ratified the protocol. By the end of the first commitment period of the Kyoto Protocol in 2012, a new international framework needs to be implemented. </p>
                            </div>
                            <div class="search_content">
                                <h4>Leadership in Energy and Environmental Design (LEED)</h4>
                                <p class="mb-2 pb-75">The Leadership in Energy and Environmental Design (LEED), developed by the U.S. Green Building Council (USGBC), provides standards for environmentally sustainable construction. </p>
                            </div>
                            <div class="search_content">
                                <h4>Level of Criticality</h4>
                                <p class="mb-2 pb-75">A criticality level is assigned to each weakness/strength for each supplier. It represents the level of importance for a given issues. The higher the criticality level, the more important the stakes (e.g. number of CSR criteria impacted) and the higher the number of check marks or the alert signs for the associated strength or weakness. </p>
                            </div>
                            <div class="search_content">
                                <h4>Life Cycle Assessment (LCA)</h4>
                                <p class="mb-2 pb-75">A Life Cycle Assessment (LCA), also known as life cycle analysis, ecobalance, cradle-to-grave-analysis and well-to-wheel analysis is the assessment of the environmental impact of a given product or service throughout its lifespan. </p>
                            </div>
                            <div class="search_content">
                                <h4>Local & Accidental Pollution (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Local pollution is one of the criteria assessed by EcoVadis. It deals with the impact from operations on local environment around the company facilities which includes emissions of dust, noise and odors. It also includes accidental pollutions (e.g. spills) and road congestion around the operation facilities. </p>
                            </div>
                            <div class="search_content">
                                <h4>Long-Range Research Initiative (LRI)</h4>
                                <p class="mb-2 pb-75">The Long-range Research Initiative (LRI) is a research initiative aims at identifying and fill gaps in the understanding of the hazards posed by chemicals and to improve the methods available for assessing the associated risks. [Source: CEFIC-LRI] </p>
                            </div>
                            <div class="search_content">
                                <h4>Lost Day</h4>
                                <p class="mb-2 pb-75">Lost days are the number of days that could not be worked, and thus ‘lost’, as a consequence of a worker or workers being unable to perform their usual work because of an occupational accident or disease. A return to limited duty or alternative work for the same organization does not count as lost days. [Source: GRI] </p>
                            </div>
                            <div class="search_content">
                                <h4>Lost Time Injury</h4>
                                <p class="mb-2 pb-75">A lost time injury (or lost time accident) is any work related injury or illness which prevents that person from doing any work day after accident. Lost time injuries are defined as occupational accidents that resulted in time lost from work of one day/shift or permanent disability or a fatality. The number of lost time injuries is used to calculate the lost time injury frequency rate (or accident frequency rate). </p>
                            </div>
                            <div class="search_content">
                                <h4>Lost Workdays</h4>
                                <p class="mb-2 pb-75">Lost workdays or days lost due to injuries represent the total number of days taken off work due to work-related illness and workplace injuries. The number of days lost is used to calculate the lost time severity rate. </p>
                            </div>
                            <div class="search_content">
                                <h4>Low-Energy House</h4>
                                <p class="mb-2 pb-75">A low-energy house refers to any type of house that uses less energy from any source (from design, technologies and building products) than a traditional or average contemporary house. A range of standards have been developed such as Energy Star, Passivhaus, and BBC Effinergie. Low-energy buildings typically imply high levels of insulation, energy efficient windows, low levels of air infiltration, and heat recovery ventilation to lower heating and cooling energy consumption. </p>
                            </div>
                            <div class="search_content">
                                <h4>Marine Stewardship Council (MSC)</h4>
                                <p class="mb-2 pb-75">The Marine Stewardship Council (MSC) aims at promoting sustainable fishing. It is a world leading certification and ecolabelling program for sustainable seafood. [Source: MSC] </p>
                            </div>
                            <div class="search_content">
                                <h4>MASE UIC</h4>
                                <p class="mb-2 pb-75">This Manual for Improvement of Safety in Operating Companies (Manuel d'Amélioration Sécurité des Entreprises) is a common referent for the petrochemicals sector and the UIC (area of chemistry ). It is a HSE management system and part of a process of continuous performance improvement in companies. It is based on five main points: management commitment, competence and professional qualifications of the staff, the preparation and organization of work, monitoring and continuous improvement. Its purpose is to establish a preventive system to avoid accidents and prevent dangerous situations. </p>
                            </div>
                            <div class="search_content">
                                <h4>Material Safety Data Sheet (MSDS)</h4>
                                <p class="mb-2 pb-75">A Material Safety Data Sheet (MSDS) is a form which contains data on the properties of a particular substance. It is an important component of workplace safety. MSDSs are required when a substance or preparation is supplied to any user in the European Union if the substance or the preparation contains a substance classified as dangerous or a SVHC, PBT or vPvB. They must be distributed by the manufacturer or distributor of the product. </p>
                            </div>
                            <div class="search_content">
                                <h4>Materials, Chemicals & Waste (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">This is one of the criteria assessed by EcoVadis. It covers the consumption of all types of raw materials and chemicals as well as non-hazardous and hazardous waste generated from operations. It also includes air emissions other than GHG (e.g. SOx, NOx). </p>
                            </div>
                            <div class="search_content">
                                <h4>Methanation</h4>
                                <p class="mb-2 pb-75">Methanation is the reaction by which carbon oxides and hydrogen are converted to methane and water. The reaction is catalysed by nickel catalysts. In industry, there are two main uses for methanation: to purify synthesis gas (i.e. remove traces of carbon oxides) and to manufacture methane. </p>
                            </div>
                            <div class="search_content">
                                <h4>Mobile Phone Partnership Initiative (MPPI)</h4>
                                <p class="mb-2 pb-75">The Mobile Phone Partnership Initiative (MPPI) is a convention signed in the frame of Basel Convention. Its objective is to promote ecological management of the end-of-life of cell phones. [Source: Basel Convention] </p>
                            </div>
                            <div class="search_content">
                                <h4>Mobile Workers</h4>
                                <p class="mb-2 pb-75">Mobile workers are those who work at least 10 hours per week away from home and from their main place of work, e.g. on business trips, in the field, travelling or on customers’ premises, and use online computer connections when doing so. </p>
                            </div>
                            <div class="search_content">
                                <h4>MSCI ESG Indexes</h4>
                                <p class="mb-2 pb-75">MSCI ESG indexes are designed to represent the most prevalent environmental, social and governance (ESG) investment strategies, utilizing MSCI's award-winning ESG data and ratings on thousands of companies worldwide. Institutional investors interested in sustainable investing can use these industry-leading indexes to benchmark ESG investment performance, issue index-based ESG investment products, and manage and report on ESG mandate compliance. [Source: MSCI] </p>
                            </div>
                            <div class="search_content">
                                <h4>Multimodal Transport</h4>
                                <p class="mb-2 pb-75">Multimodal transport is the carriage of goods by at least two different modes of transport on the basis of a multimodal transport contract from a place in one country where the goods are taken in charge by the multimodal transport operator to a place designated for delivery situated in a different country (e.g. shipping by rail and delivery by sea). The advantage of the multimodal transport is the use of the most efficient combination of transport modes to keep CO2 emissions or route distance lower than those from single mode transport methods. [Source: UN Multimodal Convention] </p>
                            </div>
                            <div class="search_content">
                                <h4>NF Environnement</h4>
                                <p class="mb-2 pb-75">The NF Environnement mark is a voluntary certification mark issued by AFNOR Certification. This mark, which was created in 1991, is the official French ecological certification. The NF mark is a collective certification mark. It guarantees the quality and safety of the products and services certified. The use of products bearing the NF Environnement mark, as of those marked with the European Eco-label, contributes to ecologically responsible consumer behaviour. </p>
                            </div>
                            <div class="search_content">
                                <h4>NHS Supply Chain Code of Conduct</h4>
                                <p class="mb-2 pb-75">The NHS Supply Chain Supplier Code of Conduct sets CSR standards on social, environmental and ethical issues for suppliers of the UK’s National Health Service and healthcare organizations. [Source: NHS Supply Chain] </p>
                            </div>
                            <div class="search_content">
                                <h4>Non-Governmental Organization (NGO)</h4>
                                <p class="mb-2 pb-75">A non-governmental organization (NGO) is any non-profit organization, which is not part of a government. Its aim is to advocate for and support private, public or humanitarian interests (e.g. defense of human rights, environment protection, fight against poverty). INGO can also be used for international non-governmental organization. </p>
                            </div>
                            <div class="search_content">
                                <h4>Nordic Ecolabel</h4>
                                <p class="mb-2 pb-75">The Nordic Ecolabel is the official ecolabel of the Nordic countries and was established in 1989 by the Nordic Council of Ministers with the purpose of providing an environmental labelling scheme that would contribute to a sustainable consumption. It is a voluntary, positive ecolabelling of products and services. The Nordic Ecolabel was also initiated as a practical tool for consumers to help them actively choose environmentally-sound products. It is an ISO 14024 type 1 ecolabelling system and is a third-party control organ. [Source: Nordic-ecolabel] </p>
                            </div>
                            <div class="search_content">
                                <h4>NOx</h4>
                                <p class="mb-2 pb-75">NOx refers to the various oxides of nitrogen (NO, NO2, N2O2, etc.). These chemical compounds are generally emitted during fuel combustion and chemical industry operations, and they can contribute to the acidification of soil and water. </p>
                            </div>
                            <div class="search_content">
                                <h4>NRE (New Economic Regulations)</h4>
                                <p class="mb-2 pb-75">The Nouvelles Regulations Economiques (NRE), passed by the French Parliament, constitutes a broad-ranging update of French corporate law. The majority of its articles addresses items such as improving corporate governance, increasing transparency in competition, and strengthening antitrust regulation. It also requires disclosures on social and environmental issues in the annual reports of firms listed on the French stock exchange. It imposed the first legal requirement, of any nation, for firms to develop and publicly report on financial, social, and environmental impacts. </p>
                            </div>
                            <div class="search_content">
                                <h4>Occupational Disease</h4>
                                <p class="mb-2 pb-75">Occupational disease refers to any disease arising from the work situation or activity (e.g. regular exposure to harmful chemicals, stress) or from a work-related injury. </p>
                            </div>
                            <div class="search_content">
                                <h4>Occupational Disease</h4>
                                <p class="mb-2 pb-75">Occupational disease refers to any disease arising from the work situation or activity (e.g. regular exposure to harmful chemicals, stress) or from a work-related injury. </p>
                            </div>
                            <div class="search_content">
                                <h4>Occupational Injury</h4>
                                <p class="mb-2 pb-75">Occupational injury refers to any non-fatal or fatal injury arising out of or in the course of work. </p>
                            </div>
                            <div class="search_content">
                                <h4>OECD Due Diligence Guidance for Responsible Supply Chains of Minerals from Conflict-Affected and High-Risk Areas</h4>
                                <p class="mb-2 pb-75">The OECD Due Diligence Guidance for Responsible Supply Chains of Minerals from Conflict-Affected and High-Risk Areas is a collaborative government-backed multi-stakeholder initiative on responsible supply chain management of minerals from conflict-affected areas. The Guidance provides management recommendations for global responsible supply chains of minerals to help companies to respect human rights and avoid contributing to conflict through their mineral or metal purchasing decisions and practices. [Source: OECD] </p>
                            </div>
                            <div class="search_content">
                                <h4>OECD Guidelines for Multinational Enterprises</h4>
                                <p class="mb-2 pb-75">The OECD Guide‌lines for Multinational Enterprises are the most comprehensive set of government-backed recommendations on responsible business conduct in existence today. Governments adhering to these guidelines aim to encourage and maximise the positive impact MNEs can make on sustainable development and enduring social progress. </p>
                            </div>
                            <div class="search_content">
                                <h4>Oeko-Tex Standard 100</h4>
                                <p class="mb-2 pb-75">The OEKO-TEX® Standard 100 is an independent testing and certification system for textile raw materials, and intermediate and end products at all stages of production. Examples for items eligible for certification: Raw and dyed/finished yarns, raw and dyed/finished fabrics and knits, ready-made articles (all types of clothing, domestic and household textiles, bed linen, terry cloth items, textile toys and more). [Source: Oeko-Tex] </p>
                            </div>
                            <div class="search_content">
                                <h4>Oeko-Tex Standard 100plus</h4>
                                <p class="mb-2 pb-75">The OEKO-TEX® Standard 100plus is a product label which enables textile and clothing manufacturers to provide evidence to their end users that their products have been optimised for human ecology and that the production conditions are environmentally friendly. Products with this label are tested for harmful substances according to OEKO-TEX® Standard 100 and are produced exclusively at environmentally friendly production sites. [Source: Oeko-Tex] </p>
                            </div>
                            <div class="search_content">
                                <h4>OHSAS 18001</h4>
                                <p class="mb-2 pb-75">OHSAS 18001 is an international standard for occupational health and safety management systems. Organisations that implement OHSAS 18001 have a clear management structure with defined authority and responsibility, clear objectives for improvement, with measurable results and a structured approach to risk assessment. This includes the monitoring of health and safety management failures, auditing of performance and review of policies and objectives. [Source: OHSAS] </p>
                            </div>
                            <div class="search_content">
                                <h4>Organic Agriculture</h4>
                                <p class="mb-2 pb-75">According to the Food and Agriculture Organization of the United Nations (FAO), organic agriculture is based on four principles: health, ecology, fairness and care. Those principles apply to agriculture in the broadest sense, including the way people tend to soils, water, plants and animals in order to produce, prepare and distribute goods. They concern the way people interact with living landscapes, relate to one another and shape the legacy of future generations. Organic agriculture can be certified by national or international standards. [Source: FAO] </p>
                            </div>
                            <div class="search_content">
                                <h4>Ozone-Depleting Substance (ODS)</h4>
                                <p class="mb-2 pb-75">An ozone-depleting substance (ODS) refers to any substance that can deplete the stratospheric ozone layer. Most ozone-depleting substances are controlled under the Montreal Protocol and its amendments, and include CFCs, HCFCs, halons and methyl bromide. [Source: GRI] </p>
                            </div>
                            <div class="search_content">
                                <h4>Pan-European Forest Certification (PEFC)</h4>
                                <p class="mb-2 pb-75">The Pan-European Forest Certification or Programme for the Endorsement of Forest Certification (PEFC) scheme promotes sustainably managed forests through independent third-party certification. The PEFC Council is an independent, non-profit, non-governmental organization founded in 1999. [Source: PEFC] </p>
                            </div>
                            <div class="search_content">
                                <h4>Parent Company</h4>
                                <p class="mb-2 pb-75">A parent company is a company that owns enough voting stock in another firm to control management and operations by influencing or electing its board of directors. There is not necessarily an operational link between the two companies. </p>
                            </div>
                            <div class="search_content">
                                <h4>PAS 2060</h4>
                                <p class="mb-2 pb-75">PAS 2060 Standard for Carbon Neutrality was created in October 2009 by BSI with the objective of increasing transparency of carbon neutrality claims by providing a common definition and recognized method of achieving carbon neutral status. The specification defines a consistent set of measures and requirements which apply to organizations of all types, including buildings, transport, manufacturing, product lines, and events. [Source: BSI] </p>
                            </div>
                            <div class="search_content">
                                <h4>PDCA Cycle</h4>
                                <p class="mb-2 pb-75">The Plan-Do-Check-Action (PDCA) cycle is a system for achieving higher objectives and goals through the cumulative repetition of a procedure comprising of the following four steps: Formulation of policies and plans; Implementation and operation; Evaluation and analysis; and Countermeasures. </p>
                            </div>
                            <div class="search_content">
                                <h4>Perchloroethylene/Tetrachloroethylene (PCE)</h4>
                                <p class="mb-2 pb-75">Perchloroethylene (PCE) is a man-made chemical used for dry-cleaning clothes, degreasing metal parts and as an ingredient in the manufacturing of other chemicals. High levels of PCE can cause health hazards when inhaled. </p>
                            </div>
                            <div class="search_content">
                                <h4>Persistent Organic Pollutants (POPs)</h4>
                                <p class="mb-2 pb-75">Persistent organic pollutants (POPs) are chemical substances that persist in the environment, bioaccumulate through the food web, and pose a risk of causing adverse effects to human health and the environment. POPs were once heavily used as pesticides. Others are used in industrial processes and in the production of a range of goods such as solvents, polyvinyl chloride, and pharmaceuticals. </p>
                            </div>
                            <div class="search_content">
                                <h4>Pharmaceutical Supply Chain Initiative (PSCI)</h4>
                                <p class="mb-2 pb-75">The Pharmaceutical Supply Chain Initiative (PSCI) is an association of large pharmaceutical companies with the aim to support pharmaceutical suppliers to operate in a manner consistent with industry expectations regarding ethics, labor, health and safety, environment and management systems. The principles of this initiative are a voluntary CSR standard for suppliers. [Source: PSCI] </p>
                            </div>
                            <div class="search_content">
                                <h4>Philanthropy</h4>
                                <p class="mb-2 pb-75">Philanthropy is the promotion of the welfare of others through the donation of money to good causes. It has to be distinguished from community involvement. </p>
                            </div>
                            <div class="search_content">
                                <h4>Photovoltaics (PV)</h4>
                                <p class="mb-2 pb-75">Photovoltaics (PV) is a process whereby solar energy (photons) is directly converted into electricity without mechanical conversion. </p>
                            </div>
                            <div class="search_content">
                                <h4>Phthalates</h4>
                                <p class="mb-2 pb-75">Phthalates are a group of chemicals used to soften and increase the flexibility of plastic and vinyl. Polyvinyl chloride is made softer and more flexible by the addition of phthalates. Phthalates are used in hundreds of consumer products. Phthalates are suspected to be endocrine disruptors and reasonably anticipated to be a human carcinogen. </p>
                            </div>
                            <div class="search_content">
                                <h4>Phytosanitary Products</h4>
                                <p class="mb-2 pb-75">Products that are labeled as phytosanitary are those that are free or clean of plant pests. Phytosanitary regulations for products differ between countries, but there are certificates usually issued by a plant regulatory official to certify that the products are free from quarantine pests, injurious pests, and they conform to phytosanitary regulations. </p>
                            </div>
                            <div class="search_content">
                                <h4>Polychlorinated Biphenyl (PCB)</h4>
                                <p class="mb-2 pb-75">The Polychlorinated Biphenyl (PCB) is a substance that was used as a dielectric oil and coolant for electrical equipment because of it is properties (chemically stable, flame-retardant, non-conductive to electricity etc). It is nevertheless highly toxic and falls under the general term "dioxin." Its manufacture and use have been prohibited in many countries. </p>
                            </div>
                            <div class="search_content">
                                <h4>Polyvinyl Chloride (PVC)</h4>
                                <p class="mb-2 pb-75">Polyvinyl Chloride (PVC), is a widely used thermoplastic polymer. Dioxin (the most potent carcinogen known), ethylene dichloride and vinyl chloride are unavoidably created in the production of PVC and can cause severe health problems, in its manufacture, product life and disposal. </p>
                            </div>
                            <div class="search_content">
                                <h4>Powder Factor</h4>
                                <p class="mb-2 pb-75">The powder factor is the mass of explosive (kg) used to break each cubic meter of rock. It offers a comparative guide to blasting performance. </p>
                            </div>
                            <div class="search_content">
                                <h4>Precautionary Principle</h4>
                                <p class="mb-2 pb-75">The precautionary principle is a moral and political principle which states that if an action or policy might cause severe or irreversible harm to the public or the environment, in the absence of scientific consensus that harm would not ensue, the burden of proof that it is not harmful falls on those taking the action. </p>
                            </div>
                            <div class="search_content">
                                <h4>Price Fixing</h4>
                                <p class="mb-2 pb-75">Price fixing is an anti-competitive practice where parties collude to sell or buy a product or service at a fixed price. </p>
                            </div>
                            <div class="search_content">
                                <h4>Product End-of-Life (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">It is part of EcoVadis criteria and refers to steps taken by companies to mitigate the environmental impacts from the disposal of their products (e.g. recycling, WEEE Directive, RoHS). The criteria covers direct environmental impacts generated from the end-of-life of the products and services. These impacts can include hazardous and non-hazardous waste, emissions and accidental pollution. </p>
                            </div>
                            <div class="search_content">
                                <h4>Product Stewardship</h4>
                                <p class="mb-2 pb-75">Product Stewardship (or Extended Producer Responsibility) is an environmental policy approach in which the producer's responsibility for reducing and managing the environmental impact of a product is extended across the whole product life cycle, from selection of materials and design to its disposal. </p>
                            </div>
                            <div class="search_content">
                                <h4>Product Tying</h4>
                                <p class="mb-2 pb-75">Product tying occurs when two or more products are sold together in a package and at least one of these products is sold as a mandatory addition to the purchase. It may have a negative impact on price transparency and comparability among providers. [Source: European Commission] </p>
                            </div>
                            <div class="search_content">
                                <h4>Product Use (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Product Use refers to environmental impacts generated from the direct use of products. It can include energy, water, materials and chemicals use. </p>
                            </div>
                            <div class="search_content">
                                <h4>Protected Areas</h4>
                                <p class="mb-2 pb-75">A protected area is "a clearly defined geographical space, recognised, dedicated and managed, through legal or other effective means, to achieve the long term conservation of nature with associated ecosystem services and cultural values". [Source: IUCN] </p>
                            </div>
                            <div class="search_content">
                                <h4>Public-Private Alliance for Responsible Mineral Trade (PPA)</h4>
                                <p class="mb-2 pb-75">The Public-Private Alliance for Responsible Minerals Trade is a multi-sector and multi-stakeholder initiative to support supply chain solutions to conflict minerals challenges in the Great Lakes Region of Central Africa. They provide funding and coordination support to organizations working in the region to develop verifiable conflict-free supply chains, align chain-of-custody programs and practices, encourage responsible sourcing from the region, promote transparency, and bolster in-region civil society and governmental capacity. </p>
                            </div>
                            <div class="search_content">
                                <h4>Rainforest Alliance</h4>
                                <p class="mb-2 pb-75">The Rainforest Alliance works to conserve biodiversity and ensure sustainable livelihoods by transforming land-use practices, business practices and consumer behavior. The approach includes training and certification to promote healthy ecosystems and communities in some of the world’s most vulnerable ecosystems. They have also created the Rainforest Alliance Certified™ seal, recognizing environmental, social and economic sustainability that helps both businesses and consumers do their part to ensure a sustainable future. </p>
                            </div>
                            <div class="search_content">
                                <h4>REACH</h4>
                                <p class="mb-2 pb-75">REACH (Registration, Evaluation and Authorisation of Chemicals) is a regulation from the European Union that addresses the production and use of chemical substances and their potential impacts on both human health and the environment. [Source: European Commission] </p>
                            </div>
                            <div class="search_content">
                                <h4>Renewable Energy</h4>
                                <p class="mb-2 pb-75">Renewable energies are energies derived from natural processes that are replenished constantly. This includes electricity and heat generated from solar, wind, ocean, hydropower, biomass, geothermal resources, biofuels, and hydrogen derived from renewable resources. </p>
                            </div>
                            <div class="search_content">
                                <h4>Renewable Energy Certificates (RECs)</h4>
                                <p class="mb-2 pb-75">Renewable Energy Certificates (RECs) or Green Certificates are a tradable commodity proving that certain electricity is generated using renewable energy sources. RECs provide key informations about the generation of renewable electricity delivered to the utility grid. Buyers can select RECs based on the generation resource (e.g., wind, solar, geothermal). [Source: EPA] </p>
                            </div>
                            <div class="search_content">
                                <h4>Renewable Resource</h4>
                                <p class="mb-2 pb-75">Renewable resource is a resource capable of being replenished within a short time through ecological cycles (as opposed to resources such as minerals, metals, oil, gas, coal that do not renew in short time periods). </p>
                            </div>
                            <div class="search_content">
                                <h4>Repetitive Strain Injury (RSI)</h4>
                                <p class="mb-2 pb-75">Repetitive strain injury (RSI) is a disorder affecting bones and muscles due to repeating body movements. </p>
                            </div>
                            <div class="search_content">
                                <h4>Responsible Business Alliance (RBA)</h4>
                                <p class="mb-2 pb-75">Formerly known as the Electronic Industry Citizenship Coalition (EICC), the Electronic Industry Citizenship Coalition (EICC) promotes an industry code of conduct for global electronics supply chains to improve working and environmental conditions and business ethics with management accountability and responsibility. </p>
                            </div>
                            <div class="search_content">
                                <h4>Responsible Care</h4>
                                <p class="mb-2 pb-75">Responsible Care is a chemical industry's global voluntary initiative under which companies, through their national associations, work together to continuously improve their health, safety and environmental performance, and to communicate with stakeholders about their products and processes. [Source: ICCA] </p>
                            </div>
                            <div class="search_content">
                                <h4>Responsible Care Management System® (RCMS®)</h4>
                                <p class="mb-2 pb-75">Responsible Care Management System® (RCMS®) provides a formal structure for the Responsible Care Codes of Management Practices. The RCMS® is intended for implementation throughout American Chemistry Council (ACC) member and partner companies’ organization. The RCMS® must be certified through an approved, independent, third-party audit provider and is built on a "Plan-Do-Check-Act” approach. [Source: ACC] </p>
                            </div>
                            <div class="search_content">
                                <h4>Responsible Care® 14001 (RC14001)</h4>
                                <p class="mb-2 pb-75">Responsible Care® 14001 (RC14001) is a Technical Specification which combines the elements of the American Chemistry Council’s (ACC) Responsible Care® initiative with ISO 14001. It aims to ensure that the chemical industry makes health, safety, security and the environment top priorities. NSF is an accredited auditor for these initiatives. [Source: NSF] </p>
                            </div>
                            <div class="search_content">
                                <h4>Responsible Jewellery Council (RJC)</h4>
                                <p class="mb-2 pb-75">The Responsible Jewellery Council (RJC) is a not-for-profit, standards setting and certification organisation. It has more than 600 Members companies that span the jewellery supply chain from mine to retail. RJC Members commit to and are independently audited against the RJC Code of Practices – an international standard on responsible business practices for diamonds, gold and platinum group metals. The Code of Practices addresses human rights, labour rights, environmental impact, mining practices, product disclosure and many more important topics in the jewellery supply chain. RJC also works with multi-stakeholder initiatives on responsible sourcing and supply chain due diligence. The RJC’s Chain-of-Custody Certification for precious metals supports these initiatives and can be used as a tool to deliver broader Member and stakeholder benefit. </p>
                            </div>
                            <div class="search_content">
                                <h4>Responsible Marketing (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Responsible marketing is one of the EcoVadis criteria which deals with consumer data protection and privacy as well as truthfulness of marketing messages, and access to essential services. </p>
                            </div>
                            <div class="search_content">
                                <h4>Responsible Minerals Initiative (RMI)</h4>
                                <p class="mb-2 pb-75">Formerly known as the Conflict-Free Sourcing Initiative (CFSI), the Conflict-Free Sourcing Initiative (CFSI) was founded in 2008 by members of the Electronic Industry Citizenship Coalition and the Global e-Sustainability Initiative (EICC), and is one of the most utilized and respected resources for companies from a range of industries addressing conflict minerals issues in their supply chains. The Conflict-Free Smelter Program offers companies and their suppliers an independent, third-party audit that determines which smelters and refiners can be validated as “conflict-free,” in line with current global standards. Also offered is a Conflict Minerals Reporting Template, which helps companies disclose and communicate about smelters in their supply chains, and produce white papers and guidance documents on responsible conflict minerals sourcing and reporting on a regular basis. </p>
                            </div>
                            <div class="search_content">
                                <h4>Responsible Rodenticide Use (CRRU)</h4>
                                <p class="mb-2 pb-75">The rodenticide industry recognizes the need to ensure that rodenticides are used correctly and in ways that minimise the exposure of wildlife and other non-target animals. CRRU was established to promote responsible use of rodenticides among all user groups, including professional pest controllers, farmers and gamekeepers. CRRU promotes responsible use through a seven point Code of Practice. </p>
                            </div>
                            <div class="search_content">
                                <h4>Restriction of Hazardous Substances Directive (RoHS)</h4>
                                <p class="mb-2 pb-75">RoHS is the EU Restriction of Hazardous Substances Directive 2002/95/EC, short for Directive on the restriction of the use of certain hazardous substances in electrical and electronic equipment. It restricts the use of six hazardous materials in the manufacture of various types of electronic and electrical equipments. [Source: European Commission] </p>
                            </div>
                            <div class="search_content">
                                <h4>Retreading</h4>
                                <p class="mb-2 pb-75">Usually in the context of fuel efficiency and reduction of vehicle tire waste, retreading is an advanced technique used to deliver excellent fuel efficiency and eco-friendly benefits without purchasing new tires. This process extends the life of tires and lowers overall costs: it is energy and price efficient to create a retread versus a new tire, and can help fleets become more sustainable. </p>
                            </div>
                            <div class="search_content">
                                <h4>Risk Country</h4>
                                <p class="mb-2 pb-75">A risk country, as defined in EcoVadis Methodology, is a country which presents potential CSR risks for companies located in this country. Countries are analyzed and qualified according to the following issues: environment, health & social, human rights, corruption, political stability and competitiveness. </p>
                            </div>
                            <div class="search_content">
                                <h4>Roundtable on Responsible Soy (RTRS)</h4>
                                <p class="mb-2 pb-75">The Round Table on Responsible Soy Association (RTRS) is a multi-stakeholder initiative which aims to facilitate a global dialogue on sustainable soy production. It was created in Switzerland in 2006. The RTRS approved version 1 of the RTRS Standard in June 2010 with the first certificates introduced in 2011. The RTRS currently has around 150 members worldwide. [Source: RTRS] </p>
                            </div>
                            <div class="search_content">
                                <h4>Roundtable on Sustainable Palm Oil (RSPO)</h4>
                                <p class="mb-2 pb-75">The Roundtable on Sustainable Palm Oil (RSPO) is an association formed in 2004 with the objective of promoting the growth and use of sustainable palm oil products through credible global standards and engagement of stakeholders. [Source: RSPO] </p>
                            </div>
                            <div class="search_content">
                                <h4>SA8000</h4>
                                <p class="mb-2 pb-75">SA8000 is a certifiable global social accountability standard for decent working conditions, developed and overseen by Social Accountability International (SAI). It aims at ensuring application of ethical practices in hiring and treatment of employees and in production of goods and services. [Source: SAI] </p>
                            </div>
                            <div class="search_content">
                                <h4>Safety & Quality Assessment System (SQAS)</h4>
                                <p class="mb-2 pb-75">Safety & Quality Assessment System (SQAS) is a system to evaluate the quality, safety, security and environmental performance of Logistics Service Providers and Chemical Distributors. The standardized assessment by independent organizations occurs through a questionnaire process. The European Chemical Industry Council (CEFIC) centrally manages the system. [Source: SQAS] </p>
                            </div>
                            <div class="search_content">
                                <h4>Safety Checklist for Contractors (SCC)</h4>
                                <p class="mb-2 pb-75">The Safety Checklist for Contractors (SCC) is a standard for the evaluation and certification of safety management systems, certifying that subcontractors' internal processes have been measured against best practices in safety management of hazardous work and found compliant. [Source: SCC] </p>
                            </div>
                            <div class="search_content">
                                <h4>Scarcity Principle</h4>
                                <p class="mb-2 pb-75">"Scarcity Principle" is an economic theory which states that limited supply, combined with high demand, equals a lack of pricing equilibrium. Typically, demand and supply will gravitate prices to a stable balance; however, scarcity of a good or service changes the buyers will value the purchase, thus leading to new market conditions. </p>
                            </div>
                            <div class="search_content">
                                <h4>Server Virtualization</h4>
                                <p class="mb-2 pb-75">Server virtualization entails running applications in separate, isolated virtual machines (VMs) within a single server. Widely used in enterprise and cloud computing datacenters, each VM runs its own OS and application and can be moved or copied from one server to another for load balancing or to expand processing capability. Advantages include: reducing the number of servers, reducing total cost of ownership, enhance availability and business continuity, and increase efficiency. </p>
                            </div>
                            <div class="search_content">
                                <h4>Smart Grid</h4>
                                <p class="mb-2 pb-75">A smart grid is an integrated transmission system for the delivery of electricity from producers to consumers. The system is smart in that it uses digital technologies to optimize efficiency, save energy and costs and to provide increased reliability and transparency. Smart grids are being promoted in many areas to address energy, environmental and reliability issues for electric power. </p>
                            </div>
                            <div class="search_content">
                                <h4>Smart Meter</h4>
                                <p class="mb-2 pb-75">A smart meter is a device that is designed to provide information about energy consumption on a real time basis. This information includes data on how much gas and electricity are consumed, how much it is costing and what impact consumption is having on greenhouse gas emissions. </p>
                            </div>
                            <div class="search_content">
                                <h4>Social Dialogue (EcoVadis citeria)</h4>
                                <p class="mb-2 pb-75">It is one of the criteria assessed by EcoVadis. It deals with structured social dialogue i.e. social dialogue deployed through recognized employee representatives and collective bargaining. </p>
                            </div>
                            <div class="search_content">
                                <h4>SOx</h4>
                                <p class="mb-2 pb-75">SOx refers to the general sulfur oxides (SO, SO2, SO3, etc.). These chemical compounds are generally emitted during fuel combustion and chemical industry operations and contribute to climate change through sulphate aerosol formation, acid rain and other air quality problems. </p>
                            </div>
                            <div class="search_content">
                                <h4>Specific Absorption Rate (SAR)</h4>
                                <p class="mb-2 pb-75">The specific absorption rate (SAR) is the measure of the amount of radiofrequency energy absorbed by the body when using a mobile phone. </p>
                            </div>
                            <div class="search_content">
                                <h4>Stakeholder</h4>
                                <p class="mb-2 pb-75">A stakeholder represents an individual or group that has an interest in any decision or activity of an organization. [Source: ISO 26000] </p>
                            </div>
                            <div class="search_content">
                                <h4>Substance of Very High Concern (SVHC)</h4>
                                <p class="mb-2 pb-75">A Substance of Very High Concern (SVHC) is a chemical substance listed by the European Chemicals Agency (ECHA) as being carcinogenic, mutagenic or having other highly harmful effects. Listing of a substance as an SVHC is the first step in the procedure for restriction of use of a chemical under REACH regulation. [Source: ECHA] </p>
                            </div>
                            <div class="search_content">
                                <h4>Supplier Environmental Practices (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Supplier Environmental Practices is one of the EcoVadis criteria. It deals with environmental issues within the supply chain i.e. environmental impacts generated from the suppliers and subcontractors own operations and products. </p>
                            </div>
                            <div class="search_content">
                                <h4>Supplier Ethical Data Exchange (SEDEX)</h4>
                                <p class="mb-2 pb-75">Supplier Ethical Data Exchange (SEDEX) is a not-for-profit membership organization dedicated to driving improvements in responsible and ethical business practices in global supply chains, and easing the burden on suppliers facing multiple audits, questionnaires, and certifications. It provides its members with a secure online platform for sharing and viewing information on labour standards, health and safety, the environment, and business ethics. [Source: SEDEX] </p>
                            </div>
                            <div class="search_content">
                                <h4>Supplier Social Practices (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Supplier & Social is one of the EcoVadis criteria. It deals with labor practices and human rights issues within the supply chain i.e. labor practices and human rights issues generated from the suppliers and subcontractors own operations or products. </p>
                            </div>
                            <div class="search_content">
                                <h4>SusChem</h4>
                                <p class="mb-2 pb-75">The European Technology Platform for Sustainable Chemistry, also known as SusChem, is a platform that seeks to boost chemistry, biotechnology and chemical engineering research, development and innovation in Europe. It aims, among other things, at achieving more sustainable practices in the EU chemical industry. [Source: SusChem] </p>
                            </div>
                            <div class="search_content">
                                <h4>Sustainable Apparel Coalition (SAC)</h4>
                                <p class="mb-2 pb-75">The Sustainable Apparel Coalition is a trade organization comprised of brands, retailers, manufacturers, government and non-governmental organizations, and academic experts, representing more than a third of the global apparel and footwear market. The coalition is working to reduce the environmental and social impacts of apparel and footwear products around the world. </p>
                            </div>
                            <div class="search_content">
                                <h4>Sustainable Forestry Initiative (SFI)</h4>
                                <p class="mb-2 pb-75">The Sustainable Forestry Initiative (SFI) certification standard is based on principles that promote sustainable forest management, including measures to protect water quality, biodiversity, wildlife habitat, species at risk, and Forests with Exceptional Conservation Value. [Source: SFI Program] </p>
                            </div>
                            <div class="search_content">
                                <h4>Sustainable Packaging Coalition (SPC)</h4>
                                <p class="mb-2 pb-75">The Sustainable Packaging Coalition (SPC) is a project of GreenBlue, a non-profit organization based in the U.S. The SPC is an industry working group focused on green packaging and dedicated to provide a forum for supply chain collaboration, support innovation and provide education, resources and tools. [Source: SPC] </p>
                            </div>
                            <div class="search_content">
                                <h4>Sustainable Procurement</h4>
                                <p class="mb-2 pb-75">Sustainable procurement means the consideration of social and environmental factors alongside financial factors in making procurement decisions. It implies looking beyond the traditional economic parameters in making procurement decisions and making decisions based on the whole life cost, the associated risks, measures of success and implications for society and the environment. [Source: UN Procurement Practitioner’s Handbook] </p>
                            </div>
                            <div class="search_content">
                                <h4>Sustainable Purchasing Leadership Council</h4>
                                <p class="mb-2 pb-75">The Sustainable Purchasing Leadership Council is a non-profit organization whose mission is to support and recognize purchasing leadership that accelerates the transition to a prosperous and sustainable future. The Council’s programs and community of practice will help institutional purchasers. </p>
                            </div>
                            <div class="search_content">
                                <h4>Tetrachloroethylene (PERC)</h4>
                                <p class="mb-2 pb-75">Tetrachloroethylene (also known as PERC) is used for dry cleaning and textile processing, as a chemical intermediate, and for vapor degreasing in metal-cleaning operations. Occupational exposure to tetrachloroethylene primarily occurs in industries using (e.g. dry cleaners) and manufacturing the chemical. EPA has classified tetrachloroethylene as likely to be carcinogenic to humans. </p>
                            </div>
                            <div class="search_content">
                                <h4>The Battery Directive</h4>
                                <p class="mb-2 pb-75">The 2006/66/EC Directive on batteries, accumulators and waste batteries and accumulators regulates the manufacture and disposal of batteries in the European Union with the indirect aim of improving their environmental performance. It introduces measures to prohibit the marketing of some batteries containing hazardous substances, and promotes collection and recycling. [Source: European Commission] </p>
                            </div>
                            <div class="search_content">
                                <h4>The Ruggie Framework</h4>
                                <p class="mb-2 pb-75">The UN "Protect, Respect and Remedy" Framework for Business and Human Rights (‘Ruggie Framework’) is a set of principles for policymakers and executives to protect and respect human rights. The Guiding Principles on Business and Human Rights outline how nation states and businesses should implement the Ruggie Framework. [Source: UN] </p>
                            </div>
                            <div class="search_content">
                                <h4>Threshold Limit Value (TLV)</h4>
                                <p class="mb-2 pb-75">The Threshold Limit Value (TLV) is a recommended limit for chemical substance or gas (but also odors or noise exposure). It represents a standard recognized by industry as the maximum amount or concentration of a chemical that a worker can be exposed to. </p>
                            </div>
                            <div class="search_content">
                                <h4>Time-Weighted Average (TWA)</h4>
                                <p class="mb-2 pb-75">A time-weighted average is used to calculate a worker's daily exposure to a hazardous substance or agent, taking into account the average levels of the substance or agent and the time spent in the area. This is the guideline OSHA uses to determine permissible exposure limits (PELs) and is essential in assessing a worker's exposure and determining what protective measures should be taken. A time-weighted average is equal to the sum of the portion of each time period multiplied by the levels of the substance or agent during the time period, divided by the hours in the workday. </p>
                            </div>
                            <div class="search_content">
                                <h4>Together for Sustainability (TfS)</h4>
                                <p class="mb-2 pb-75">Together for Sustainability is a chemical initiative aimed at enhancing and improving sustainability within the supply chain. The purpose is to develop and implement a global audit program to assess and improve sustainability practices within the supply chains of the chemical industry. </p>
                            </div>
                            <div class="search_content">
                                <h4>Total Cost of Ownership (TCO)</h4>
                                <ol>
                                    <li>TCO is a certification scheme that offers ecolabels for IT products.</li>
                                </ol>
                            </div>
                            <div class="search_content">
                                <h4>Total Suspended Solids (TSS)</h4>
                                <p class="mb-2 pb-75">The Total Suspended Solids (TSS) is a water quality measurement of the small particles of solid material (pollutants) suspended or dispersed in wastewater. It is used as an index of water quality/pollution level and of treatment system performance. </p>
                            </div>
                            <div class="search_content">
                                <h4>Totally Chlorine-Free (TCF)</h4>
                                <p class="mb-2 pb-75">The TCF ecolabel is achieved through accreditation against a set of standards set in place by the Chlorine Free Products Association (CFPA). It was created to promote sustainable manufacturing practices, implement advanced technologies free of chlorine chemistry, educate consumers on alternatives, and develop world markets for sustainably produced third party certified products and services, all without the use of chlorine. </p>
                            </div>
                            <div class="search_content">
                                <h4>Toxic Substances Control Act (TSCA)</h4>
                                <p class="mb-2 pb-75">The Toxic Substances Control Act of 1976 provides the EPA with the authority to require reporting, record-keeping and testing requirements, and restrictions relating to chemical substances and/or mixtures. It addresses the production, importation, use, and disposal of specific chemicals including polychlorinated biphenyls (PCBs), asbestos, radon and lead-based paint. </p>
                            </div>
                            <div class="search_content">
                                <h4>Toxigenic Substances</h4>
                                <p class="mb-2 pb-75">A toxigenic substance is a poisonous substance derived from or containing toxins. For example, the mycotoxins are toxic chemical products produced by fungi that readily colonize crops. </p>
                            </div>
                            <div class="search_content">
                                <h4>Tributyltin (TBT)</h4>
                                <p class="mb-2 pb-75">Tributyltin (TBT) is a toxic compound used as a biocide in antifouling paints (e.g. applied to underwater parts of ships and boats), wood preservation, textiles and industrial water systems. TBT compounds are considered toxic chemicals which have negative effects on human and environment and considered as persistent organic pollutants. </p>
                            </div>
                            <div class="search_content">
                                <h4>Triple Bottom Line (TBL)</h4>
                                <p class="mb-2 pb-75">The Triple Bottom Line (TBL) consists of three pillars: Profit, People and Planet. It aims to measure the financial, social and environmental performance of a corporation over a period of time. </p>
                            </div>
                            <div class="search_content">
                                <h4>UN Millennium Development Goals (MDGs)</h4>
                                <p class="mb-2 pb-75">The UN Millennium Development Goals (MDGs) were endorsed by global leaders to be achieved at a global level by the year 2015. Comprised of 8 targets and 48 indicators, these seven goals call for fostering a global partnership for provision of universal education, gender empowerment, improved health and disease control, and poverty alleviation in the world. Entities can contribute through including low-income people in their core business operations, bringing low cost innovations to market, and giving back to the community through philanthropic activities. [Source: UN] </p>
                            </div>
                            <div class="search_content">
                                <h4>United Nations ADR agreement</h4>
                                <p class="mb-2 pb-75">The European Agreement concerning the International Carriage of Dangerous Goods by Road (ADR) is intended to increase the safety of international transport of dangerous goods by road. It contains the technical requirements for road transport, i.e. the conditions under which dangerous goods, when authorized for transport, may be carried internationally, as well as uniform provisions concerning the construction and operation of vehicles carrying dangerous goods. It also establishes international requirements and procedures for training and safety obligations of participants. The Agreement has been regularly amended and updated since its entry into force, with the latest version applicable starting 1 January 2015. </p>
                            </div>
                            <div class="search_content">
                                <h4>United Nations Global Compact (UNGC)</h4>
                                <p class="mb-2 pb-75">The United Nations Global Compact (UNGC) is a voluntary initiative that encourages businesses worldwide to adopt sustainable and socially responsible policies, and to report on them. Global Compact participants commit to respecting 10 principles on human rights, labor rights, environment and anti-corruption. The initiative has a mandatory disclosure framework, which motivates business participants to annually report on their progress against the 10 principles in a report called Communication on Progress (COP). Companies that do not comply with this reporting requirement are delisted from the list of participants after two years. Under the UNGC, companies are connected with UN agencies, labor groups and civil society organizations.</p>
                            </div>
                            <div class="search_content">
                                <h4>United Nations Principles for Responsible Investment (UN PRI)</h4>
                                <p class="mb-2 pb-75">The United Nations-supported Principles for Responsible Investment (PRI) Initiative is an international network of investors working together to put the six Principles for Responsible Investment into practice. Its goal is to understand the implications of sustainability for investors and support signatories to incorporate these issues into their investment decision making and ownership practices. In implementing the Principles, signatories contribute to the development of a more sustainable global financial system. </p>
                            </div>
                            <div class="search_content">
                                <h4>United Nations World Tourism Organization (UNWTO)</h4>
                                <p class="mb-2 pb-75">The World Tourism Organization (UNWTO) is the United Nations agency responsible for the promotion of responsible, sustainable and universally accessible tourism. As the leading international organization in the field of tourism, UNWTO promotes tourism as a driver of economic growth, inclusive development and environmental sustainability and offers leadership and support to the sector in advancing knowledge and tourism policies worldwide. UNWTO encourages the implementation of the Global Code of Ethics for Tourism, to maximize tourism’s socio-economic contribution while minimizing its possible negative impacts, and is committed to promoting tourism as an instrument in achieving the United Nations Millennium Development Goals (MDGs), geared towards reducing poverty and fostering sustainable development. </p>
                            </div>
                            <div class="search_content">
                                <h4>Universal Declaration of Human Rights (UDHR)</h4>
                                <p class="mb-2 pb-75">The Universal Declaration of Human Rights was adopted by the United Nations General Assembly in 1948. It consists of 30 articles which outline human rights guaranteed to all people, including the right to life, the prohibition against slavery, torture and arbitrary arrest, equality before the law, and the freedom of movement, peaceful assembly, and participation in government. [Source: UN] </p>
                            </div>
                            <div class="search_content">
                                <h4>Very Persistent and Very Bioaccumulative (vPvB)</h4>
                                <p class="mb-2 pb-75">Very Persistent and Very Bioaccumulative (vPvB) substances are compounds that persist in the environment (half-life between 60-180 days) and accumulate in the food chain in living organisms for a long period of time (bioconcentration factor greater than 5000). They are considered as Substances of Very High Concern (SVHC) according to REACH. </p>
                            </div>
                            <div class="search_content">
                                <h4>Video Exposure Monitoring (VEM)</h4>
                                <p class="mb-2 pb-75">Video exposure monitoring (VEM) is a technique that uses direct-reading instruments to test a worker’s exposure while performing a task as it is being recorded on videotape. It consists of logged real-time collection superimposed upon worksite video. </p>
                            </div>
                            <div class="search_content">
                                <h4>Volatile Organic Compounds (VOCs)</h4>
                                <p class="mb-2 pb-75">Volatile organic compounds (VOCs) are emitted as gases from certain solids or liquids. VOCs include a variety of chemicals, some of which may have short- and long-term adverse health effects. Concentrations of many VOCs are consistently higher indoors (up to ten times higher) than outdoors. VOCs are emitted by a wide array of products numbering in the thousands like paints or pesticides. [Source: EPA] </p>
                            </div>
                            <div class="search_content">
                                <h4>Voluntary Principles on Security and Human Rights (VPs)</h4>
                                <p class="mb-2 pb-75">The Voluntary Principles on Security and Human Rights (Voluntary Principles or VPs) are a tripartite, multi-stakeholder initiative that provides a set of principles to guide extractives companies in maintaining the security of their operations within a framework that ensures respect for fundamental human rights. [Sources: VPs] </p>
                            </div>
                            <div class="search_content">
                                <h4>Vortex Generators</h4>
                                <p class="mb-2 pb-75">Vortex Generators are blades placed in a spanwise line near the leading edge of the wing and tail surfaces. They control airflow over the upper surface of the wing by creating vortices that energize the boundary layer. This results in improved performance and control authority at low airspeeds and high angles of attack. </p>
                            </div>
                            <div class="search_content">
                                <h4>Voyage Efficiency System</h4>
                                <p class="mb-2 pb-75">Found mostly in the context of transportation efficiency, this tool can be used to make voyages more efficient in terms of waste produced, fuel consumption, and emissions. Physical changes can occur to the vessel, like retrofitting to more efficient engines, or operational measures such as speed optimization or distance planning can result in voyage efficiency. </p>
                            </div>
                            <div class="search_content">
                                <h4>Waste Electrical and Electronic Equipment Directive (WEEE)</h4>
                                <p class="mb-2 pb-75">It refers to the EU directive 2002/96/EC on waste electrical and electronic equipment (WEEE) which promotes the collection and recycling of such equipments (setting of collection, recycling and recovery targets) in order to solve the problem of huge amounts of toxic e-waste. [Source: European Commission] </p>
                            </div>
                            <div class="search_content">
                                <h4>Water (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Water is one of the EcoVadis criteria and it covers water consumption during operations as well as pollutants rejected into water. </p>
                            </div>
                            <div class="search_content">
                                <h4>Water Integrity Network (WIN)</h4>
                                <p class="mb-2 pb-75">The Water Integrity Network (WIN), formed in 2006, stimulates anti-corruption activities in the water sector locally, nationally and globally. It promotes solutions-oriented action and coalition-building between the civil society, private and public sectors, media and governments. [Source: WIN] </p>
                            </div>
                            <div class="search_content">
                                <h4>Water-based Varnishes</h4>
                                <p class="mb-2 pb-75">Water-based varnishes have certain advantages over those with a chemical solvent; the most important being that they are non-toxic and they dry faster. </p>
                            </div>
                            <div class="search_content">
                                <h4>Whistleblowing</h4>
                                <p class="mb-2 pb-75">A whistleblowing procedure is a formal independent complaint system put in place within an organization to enforce governance and ethics standards. With this procedure a whistleblower can raise concern over possible wrongdoings and illegal practices (misconduct) by an organization. Every report and the identity of the whistleblower shall be handled confidentially. </p>
                            </div>
                            <div class="search_content">
                                <h4>Wolfsberg Group</h4>
                                <p class="mb-2 pb-75">The Wolfsberg Group is an association of eleven global banks, which aims to develop financial services industry standards, and related products, for Know Your Customer, Anti-Money Laundering and Counter Terrorist Financing policies. </p>
                            </div>
                            <div class="search_content">
                                <h4>Working Conditions (EcoVadis criteria)</h4>
                                <p class="mb-2 pb-75">Working Conditions is one of the criteria assessed by EcoVadis which deals with working hours, monitoring of employee satisfaction, participation, remunerations and social benefits granted to employees. </p>
                            </div>
                            <div class="search_content">
                                <h4>Work-life Balance</h4>
                                <p class="mb-2 pb-75">Work-life balance refers to working practices that acknowledge and aim to support the needs of staff in achieving a balance between their private and working life. Examples of work life-balance measures include: the possibility to work from home, the possibility to work part-time, flexible-time schedules, childcare facilities at work, in-house services etc. </p>
                            </div>
                            <div class="search_content">
                                <h4>World Association for Opinion and Marketing Research Professionals (ESOMAR)</h4>
                                <p class="mb-2 pb-75">ESOMAR facilitates an on-going dialogue with its 4,900 members, in over 130 countries, through the promotion of a comprehensive programme of industry specific and thematic conferences, publications and best practice guidelines. ESOMAR also provides ethical guidance and actively promotes self-regulation in partnership with a number of associations across the globe. Members agree to abide by the ICC/ESOMAR International Code on Market and Social Research, which has been jointly drafted by ESOMAR and the International Chamber of Commerce and is endorsed by the major national and international professional bodies around the world. </p>
                            </div>
                            <div class="search_content">
                                <h4>World Business Council for Sustainable Development (WBCSD)</h4>
                                <p class="mb-2 pb-75">The World Business Council for Sustainable Development (WBCSD) is a CEO-led organization of some 200 companies that galvanized the global business community to create a sustainable future for business, society and the environment. [Source: WBCSD] </p>
                            </div>
                            <div class="search_content">
                                <h4>World Economic Forum Partnering Against Corruption Initiative (WEF PACI)</h4>
                                <p class="mb-2 pb-75">PACI is one of the strongest cross-industry collaborative efforts at the World Economic Forum. The initiative creates a more visible, dynamic and agenda-setting platform, working with committed business leaders, international organizations and governments to address corruption, transparency and emerging-market risks. Over the past ten years, PACI has become the leading global business voice on anti-corruption and transparency. Comprising nearly 100 active companies. </p>
                            </div>
                            <div class="search_content">
                                <h4>World Resources Institute (WRI)</h4>
                                <p class="mb-2 pb-75">The World Resources Institute (WRI) is an independent, non-profit organization founded in 1982 with headquarters in the United States. The WRI work is organized around four key programmatic goals: Climate Protection, Governance, Markets & Enterprise, People & Ecosystems. Their World Resources Report is published every two years, and gathers data for an in-depth analysis on current environmental issues. [Source: WRI] </p>
                            </div>
                            <div class="search_content">
                                <h4>World Wildlife Fund (WWF)</h4>
                                <p class="mb-2 pb-75">The world’s leading conservation organization, WWF works in 100 countries and is supported by 1.1 million members in the United States and close to 5 million globally. WWF’s unique way of working combines global reach with a foundation in science, involves action at every level from local to global, and ensures the delivery of innovative solutions that meet the needs of both people and nature. WWF's mission is to conserve nature and reduce the most pressing threats to the diversity of life on Earth. </p>
                            </div>
                            <div class="search_content">
                                <h4>World Wildlife Fund Global Forest and Trade Network</h4>
                                <p class="mb-2 pb-75">Worldwide Responsible Accredited Production (WRAP) is a U.S. not-for-profit organization which promotes ethical, social and environmental conditions and practices in manufacturing facilities. WRAP offers a global certification program for the apparel, footwear and sewn products sectors. [Source: WRAP] </p>
                            </div>
                            <div class="search_content">
                                <h4>WWF Paper scorecard</h4>
                                <p class="mb-2 pb-75">The WWF Paper scorecard is a tool set up by WWF to guide paper producers as well as commercial and individual paper buyers to reduce the environmental footprint of paper production and paper consumption. [Source: WWF] </p>
                            </div>
                        </div>
                        <div class="tab-pane" id="a" aria-labelledby="a-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>AA1000</h4>
                                    <p class="mb-2 pb-75">The AA1000 Standard Series developed by UK-based AccountAbility are principle-based standards for helping organizations become more accountable, responsible and sustainable. The AA1000 Accountability Principles Standard (AA1000APS) provides a framework for an organization to identify, prioritize and respond to its sustainability challenges. The AA1000 Assurance Standard (AA1000AS) provides a methodology for assurance practitioners regarding implementation of the principles. The AA1000 Stakeholder Engagement Standard (AA1000SES) provides a framework to help organizations integrate stakeholder engagement processes into their activities.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Accident Frequency Rate</h4>
                                    <p>The accident frequency rate (or Lost Time Injury Frequency Rate) measures the number of injuries with lost time in relation to the total amount of time worked. It both indicates the extent to which injury incidents are repeated over time and their number of occurrence.</p>
                                    <p class="mb-2 pb-75">The calculation method varies from country to country, depending for instance on the way lost time injury events are determined or the baseline used to calculate the rate. In the UK it is calculated as follows: [(total number of lost time injury events) x 100,000/total hours worked], whereas in the US it is: [(total number of lost time injury events) x 200,000/total hours worked)]. In France or Japan, the rate is calculated as [(total number of lost time injury events) x 1,000,000/total hours worked)]</p>
                                </div>
                                <div class="search_content">
                                    <h4>Accident Severity Rate</h4>
                                    <p>The accident severity rate (or Lost Time Injury Severity Rate) measures the time lost due to occupational injuries in relation to the total amount of time worked. It indicates how severe the accidents were and how long the injured employees were out of work as a result of disabling injuries.</p>
                                    <p class="mb-2 pb-75">The calculation method varies from country to country; for instance in the way lost time injury events are determined or what baseline is used to calculate the rate. In the UK it is calculated as follows: [(number of days lost due to injuries) x 200,000/total hours worked], whereas in France it is: [(number of days lost due to injuries) x 1000/total hours worked)]. In India, the rate is calculated as [(number of days lost due to injuries) x 1,000,000/total hours worked)].</p>
                                </div>
                                <div class="search_content">
                                    <h4>Accreditation of Laboratory Animal Care (AAALAC)</h4>
                                    <p class="mb-2 pb-75">The AAALAC International accreditation program evaluates organizations that use animals in research, teaching or testing. Those that meet or exceed AAALAC standards are awarded accreditation. The accreditation process includes an extensive internal review conducted by the institution applying for accreditation. During this review, the institution creates a comprehensive document called a “Program Description” which describes all aspects of the animal care and use program (policies, animal housing and management, veterinary care, and facilities). AAALAC evaluators review the Program Description and conduct their own comprehensive on-site assessment. The site visitors’ report is then reviewed by the entire Council on Accreditation and accreditation status is determined. If deficiencies are found, they are outlined in a letter and the institution is given a period of time to correct them. Once the deficiencies are corrected, accreditation is awarded. The entire process is completely confidential. After an institution earns accreditation, it must be re-evaluated every three years in order to maintain its accredited status. Currently more than 925 organizations in 40 countries have earned AAALAC accreditation.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Acid Rock Drainage Management Plan</h4>
                                    <p class="mb-2 pb-75">Acid rock drainage (ARD) occurs when certain rocks, when exposed to air and water, generate acidic runoff, and the acidity of the runoff may pollute nearby water resources. The nature of the rock, chemical reactions, resultant solution acidity levels, and severity of the environmental impact are site-specific. An ARD Management Plan includes sampling, testing, modeling, and analysis to determine appropriate action to minimize facilities' impact on water quality impairment by acid rock drainage.</p>
                                </div>
                                <div class="search_content">
                                    <h4>AdvaMed</h4>
                                    <p class="mb-2 pb-75">The Advanced Medical Technology Association (AdvaMed), is a trade association that leads the effort to advance medical technology in order to achieve healthier lives and healthier economies around the world. AdvaMed represents 80 percent of medical technology firms in the United States and acts as the common voice for companies producing medical devices, diagnostic products and health information systems.</p>
                                </div>
                                <div class="search_content">
                                    <h4>AFAQ 26000</h4>
                                    <p class="mb-2 pb-75">The AFAQ 26000 method determines to what extent an organization (company, association, administration, trade union) integrates the recommendations of the ISO 26000 standard. It measures CSR maturity according to the standard ISO 26000. Sectorial approaches were also developed for certain types of entities. [Source: AFNOR]</p>
                                </div>
                                <div class="search_content">
                                    <h4>Anaerobic Digestion</h4>
                                    <p class="mb-2 pb-75">Anaerobic digestion is a series of processes in which microorganisms break down biodegradable material in the absence of oxygen to produce biogas, principally composed of methane and carbon dioxide. It is used as part of the process to treat biodegradable waste and sewage sludge, which can be used as a source of renewable energy.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Anticompetitive Practices (EcoVadis Criteria)</h4>
                                    <p class="mb-2 pb-75">It is one of the EcoVadis criteria that deals with anti-competitive practices including, among others, bid-rigging, price fixing, dumping, predatory pricing, coercive monopoly, dividing territories, product tying, limit pricing and the non-respect of intellectual property.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Anti-Trust and Monopoly Practices</h4>
                                    <p class="mb-2 pb-75">Antitrust and monopoly practices include actions of an organization that may result in collusion to erect barriers to entry to the sector, unfair business practices, abuse of market position, cartels, anti-competitive mergers, price-fixing, and other collusive actions which prevent competition. [Source: GRI]</p>
                                </div>
                                <div class="search_content">
                                    <h4>Aquaculture Stewardship Council (ASC)</h4>
                                    <p class="mb-2 pb-75">The Aquaculture Stewardship Council (ASC) is an independent, non-profit organization that aims to be the world's leading certification and labelling programme for responsibly farmed seafood. The ASC's primary role is to manage global standards for responsible aquaculture, which were developed by the World Wildlife Fund Aquaculture Dialogues. ASC works with aquaculture producers, seafood processors, retail and foodservice companies, scientists, conservation groups, and consumers, in order to: recognise and reward responsible aquaculture through the ASC aquaculture certification programme and seafood label, promote best environmental and social choice when buying seafood, and contribute to transforming seafood markets towards sustainability.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Association Connecting Electronics Industries (IPC)</h4>
                                    <p class="mb-2 pb-75">IPC is a global trade association dedicated to furthering the competitive excellence and financial success of its members, who are participants in the electronics industry. In pursuit of these objectives, IPC will devote resources to management improvement and technology enhancement programs, the creation of relevant standards, protection of the environment, and pertinent government relations.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="b" aria-labelledby="b-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Banking Environment Initiative (BEI)</h4>
                                    <p class="mb-2 pb-75">The Chief Executives of some of the world’s largest banks created the Banking Environment Initiative (BEI) in 2010. Its mission is to lead the banking industry in collectively directing capital towards environmentally and socially sustainable economic development.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Basel Convention</h4>
                                    <p class="mb-2 pb-75">The Basel Convention on the Control of Transboundary Movements of Hazardous Wastes and their Disposal, which came into force in 1992, is the most comprehensive global environmental agreement on hazardous and other wastes. The Convention has 172 Parties and aims to protect human health and the environment against the adverse effects resulting from the generation, management, transboundary movements and disposal of hazardous and other wastes.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Bid Rigging</h4>
                                    <p class="mb-2 pb-75">Bid rigging is an illegal conspiracy in which competitors join to artificially increase the prices of goods and/or services offered in bids to potential customers. Bid rigging is a felony punishable by fines, imprisonment or both.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Biochemical Oxygen Demand (BOD)</h4>
                                    <p class="mb-2 pb-75">Biochemical Oxygen Demand is a measurement used as an indication of the organic quality of water. Wastewater often contains organic materials (food or organic carbons) that are decomposed by microorganisms, which use oxygen in the process. The amount of oxygen consumed by these organisms in breaking down the waste is known as BOD. If dissolved oxygen levels fall below 2 mg/l for more than even a few hours, this can result in fish kills. [Source: EPA]</p>
                                </div>
                                <div class="search_content">
                                    <h4>Biochemicals</h4>
                                    <p class="mb-2 pb-75">A biochemical substance is a chemical substance that occur in animals, microorganisms, and plants.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Biocides</h4>
                                    <p class="mb-2 pb-75">Biocides represent a wide range of products e.g. disinfectants, wood preservatives, rodenticides, antifouling agents (on boats), in-can preservatives, used in homes, public places such as hospitals, and industries, to destroy and control viruses, bacteria, algae, moulds, insects, mice or rats. They help prevent the spread of diseases and food poisoning. Increased or unmonitored usage can have detrimental impacts on the local environment. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Biodiversity (EcoVadis Criteria)</h4>
                                    <p class="mb-2 pb-75">It is one of the EcoVadis criteria that covers impacts from operations on animals (e.g. animal mistreatment, endangered species and land protected areas).</p>
                                </div>
                                <div class="search_content">
                                    <h4>Biodynamic Agriculture</h4>
                                    <p class="mb-2 pb-75">Biodynamic agriculture was developed as a means of a more advanced and holistic method of farming and gardening, in reaction to the declining in soil quality and animal health on farms. It is based on a view of nature as a living, self-sustaining organism; there is no use of GMOs, synthetic chemicals, fertilizers, or pesticides. It seeks to embody ecological, social, and economical sustainability approaches into an agricultural system. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Biofuel</h4>
                                    <p class="mb-2 pb-75">Biofuels are any solid, liquid or gaseous fuels produced from biomass. Types of biofuels include biodiesel, bioalcohols, ethanol, biogas, and algae. [Source: Roundtable on Sustainable Biofuels] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Biomass</h4>
                                    <p class="mb-2 pb-75">The term biomass refers to the biodegradable fraction of products, waste, and residues from biological origin (e.g. from agriculture, forestry and related industries including fisheries and aquaculture), as well as the biodegradable fraction of industrial and municipal waste. Bioenergy refers to all energy produced from biomass, including biofuels. It can be used either directly (wood energy) after methanogenesis (biogas) or new chemical transformations (biofuel). [Source: Roundtable on Sustainable Biofuels] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Biopiracy</h4>
                                    <p class="mb-2 pb-75">Biopiracy refers to the appropriation of the knowledge and genetic resources of farming and indigenous communities by individuals or institutions that seek exclusive monopoly control (patents or intellectual property) over these resources and knowledge, usually without compensating the indigenous peoples or countries from which the material or relevant knowledge is obtained. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Bioplastics</h4>
                                    <p class="mb-2 pb-75">Bioplastics, unlike traditional plastics which are derived from petroleum, are derived from renewable resources, such as vegetable fats and oils, corn starch, pea starch, or microbiota. Some bioplastics are biodegradable. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Bisphenols</h4>
                                    <p class="mb-2 pb-75">The Universal Declaration of Human Rights was adopted by the United Nations General Assembly in 1948. It consists of 30 articles which outline human rights guaranteed to all people, including the right to life, the prohibition against slavery, torture and arbitrary arrest, equality before the law, and the freedom of movement, peaceful assembly, and participation in government. [Source: UN] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Blue Angel</h4>
                                    <p class="mb-2 pb-75">The Blue Angel (Blauer Engel) is a recognized German certification for environmentally friendly products and services. It promotes the concerns of both environmental protection and consumer protection. Applicants are systematically certified against the ecolabel criteria before using the label. The Blue Angel covers around 10,000 products in 80 product categories. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Bluesign® System</h4>
                                    <p class="mb-2 pb-75">The Bluesign® system is aiming at promoting sustainable textile production. It eliminates harmful substances right from the beginning of the manufacturing process and sets and controls standards for an environmentally friendly and safe production. This not only ensures that the final textile product meets very stringent consumer safety requirements worldwide but also provides confidence to the consumer to acquire a sustainable product. [Source: Bluesign] </p>
                                </div>
                                <div class="search_content">
                                    <h4>British Retail Consortium Standards (BRC)</h4>
                                    <p class="mb-2 pb-75">The BRC Global Standards are a global safety and quality certification program, which was originally developed by the food service industry to enable suppliers to be audited by third party certification bodies. It now comprises a suite of four Standards covering different product types – food, consumer products, packaging manufacturers, and storage & distribution. These standards assist suppliers to in producing safe, legal products that meet customers' quality specifications, along with meeting their needs of legal responsibility where they sub-contract manufacturing of their own-brand goods. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Brominated Flame Retardants (BFR)</h4>
                                    <p class="mb-2 pb-75">Brominated flame retardants are chemicals applied to materials to make them fire-resistant. They contain chemicals, including Polybrominated diphenyl ethers or PBDE, a bioaccumulative substance shown to lead to health hazards. The European Union decided to ban the use of two classes of flame retardants including PBDE (see RoHS Directive). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Building Research Establishment Environmental Assessment Method (BREEAM)</h4>
                                    <p class="mb-2 pb-75">Building Research Establishment Environmental Assessment Method (BREEAM) is an environmental assessment method for buildings originally established in the UK. It sets standards in sustainable design, construction, and operation. A certified BREEAM assessment is delivered by an external organization at various stages in the building's construction. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Business In The Community (BITC)</h4>
                                    <p class="mb-2 pb-75">Business in the Community (BITC) is a British business-led charity with 850 members which advises and supports companies to create a sustainable for people and the planet and to improve business performance. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Business Principles for Countering Bribery (BPCB)</h4>
                                    <p class="mb-2 pb-75">The Business Principles for Countering Bribery are the outcome of a multi-stakeholder dialog led by Transparency International (TI) that aims to create a framework that companies could use to build their own policies against bribery. It provides definitions of related terms, outlines effective policies, and sets a baseline for what should be covered in company policy. It is accompanied by a six step implementation process to assist companies in integrating bribery policy into overall policy and practice, as well as communication, training, monitoring, and improvement. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Business Social Compliance Initiative (BSCI)</h4>
                                    <p class="mb-2 pb-75">BSCI is an initiative of the Foreign Trade Association (FTA) in response to the increasing business demand for transparent and improved working conditions in the global supply chain. They unite over 1,500 companies around one common Code of Conduct and support them in their efforts towards building an ethical supply chain by providing them with a step-by-step development-oriented system, applicable to all sectors and all sourcing countries. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Business Social Compliance Initiative (BSR)</h4>
                                    <p class="mb-2 pb-75">Business for Social Responsibility (BSR) is a non-profit organization with membership. Since 1992, BSR works with a global network of more than 300 member companies to develop sustainable business strategies and solutions through consulting, research, and cross-sector collaboration. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="c" aria-labelledby="c-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Carbon Capture and Storage (CCS)</h4>
                                    <p class="mb-2 pb-75">Carbon capture and storage (CCS) is a process based on collecting or capturing carbon dioxide (CO2) from large industrial plants (e.g. fossil fuel power plant), and storing in deep underground geological structures or underground reservoirs instead of releasing it into the atmosphere. Also known as sequestration or carbon capture and sequestration, CCS is a means of mitigating the contribution of fossil fuel emissions to global warming. While technology has been demonstrated on a small scale, it is foreseen to grow to full-scale, commercial projects by 2020. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Carbon Dioxide Equivalent (CO2E)</h4>
                                    <p class="mb-2 pb-75">Carbon dioxide equivalent (CO2E) is a measure used to compare the emissions from various greenhouse gases based on their global warming potential (GWP). The CO2E for a gas is derived by multiplying the tons of the gas by the associated GWP. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Carbon Disclosure Project (CDP)</h4>
                                    <p class="mb-2 pb-75">The Carbon Disclosure Project is an independent not-for-profit organization, after an initiative led by the institutional investor community. Each year, large corporations are asked through comprehensive questionnaires to disclose their GHGs and climate change strategies in their CDP response. The CDP channels information and progress through five separate programs, which also include CDP Water Disclosure, and CDP Supply Chain. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Carbon Footprint</h4>
                                    <p class="mb-2 pb-75">A carbon footprint is the amount of GHGs or CO2E emitted to the air by an organization, company, household, product, building, etc. International standards such as ISO 14064 provide an international standard for organizations based on the GHG protocol. The upcoming ISO 14067 standard defines the carbon footprint of a product as the sum of GHGs and removals in a product system, expressed as CO2E and based on a life cycle assessment. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Carbon Neutral Program</h4>
                                    <p class="mb-2 pb-75">The Carbon Neutral Program is a standard created by the Australian Government, that certifies products, operations or events as carbon neutral against the National Carbon Offset Standard (NCOS). Certification is achieved through the measurement and reduction of GHGs through calculations and audits, followed by the offset of remaining GHGs. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Carbon Offsetting</h4>
                                    <p class="mb-2 pb-75">Carbon offsetting is the act of mitigating greenhouse gas emissions. A well-known example is the purchasing of carbon credits or offsets to compensate for the GHGs from personal air travel. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Career Management & Training (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Career management is one of the EcoVadis criteria, which assesses policies and measures taken by companies to ensure regular assessment and appraisal of employee performance, provision of vocational training, activities and actions to support individual career goals and the management of layoffs. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Cement Sustainability Initiative (CSI)</h4>
                                    <p class="mb-2 pb-75">The Cement Sustainability Initiative (CSI) is a three-phase program in the cement industry comprising stakeholder consultation, business planning, and action and progress reporting on environmental and social issues. It gathers major cement producers with operations in more than 100 countries. </p>
                                </div>
                                <div class="search_content">
                                    <h4>CERES Principles</h4>
                                    <p class="mb-2 pb-75">A ten-point code of corporate environmental conduct to be publicly endorsed by companies as an environmental mission statement or ethic. The principles cover issues such as use of natural resources, waste disposal, energy conservation, product safety, remediation, transparency and management practices. CERES is a U.S. based non-profit organization, which comprises investors, companies and public interest groups and advocates for sustainability leadership. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Chain-of-Custody (CoC)</h4>
                                    <p class="mb-2 pb-75">Chain-of-custody (CoC) refers to the chronological documentation to track a material throughout its production process. An example of chain of custody certification could be the PEFC or FSC trademarks for responsible wood products. Wood is tracked at all successive stages of processing, transformation, manufacturing and distribution. The MSC (Marine Stewardship council) for seafood products is another example of CoC. *Note: CoC is also an acronym for Code of Conduct. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Chemical Oxygen Demand (COD)</h4>
                                    <p class="mb-2 pb-75">Chemical Oxygen Demand (COD) is a measure of the capacity of water to consume oxygen during the decomposition of organic matter and the oxidation of inorganic chemicals such as ammonia and nitrite under specific conditions of temperature and for a particular period of time. It is widely used as an indication of the quality of water. COD is used as a general indicator of water quality and is an integral part of all water quality management programs. COD analysis is a measurement of the oxygen-depletion capacity of a water sample contaminated with organic waste matter. Specifically, it measures the equivalent amount of oxygen required to chemically oxidize organic compounds in water. It is often used to estimate BOD (Biochemical Oxygen Demand), as a strong correlation exists between COD and BOD, however COD is a much faster, more accurate test. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Child Labor (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">It is one of the EcoVadis criteria, which assesses policies and measures taken by companies to deal with child, forced or compulsory labor issues within the company owned operations. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Chlorinated compounds</h4>
                                    <p class="mb-2 pb-75">Chlorinated Compounds include chemicals such as PCE (tetrachloroethene) and TCE (trichloroethene) that are commonly used in dry cleaning and industrial operations. These chemicals can breakdown into others which may also be of concern for vapor intrusion. They do not readily biodegrade in subsurface soil and may require active remediation to remove. In addition, they persist in the environment for a long time after their release. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Chlorinated Hydrocarbon (CHC)</h4>
                                    <p class="mb-2 pb-75">Chlorinated Hydrocarbons are a group of chemicals composed of carbon, chlorine, and hydrogen. As pesticides, they are also referred to by several other names, including chlorinated organics, chlorinated insecticides, and chlorinated synthetics. Although the first chlorinated hydrocarbon was synthesized in 1874, its insecticidal properties were not discovered until 1939. It was introduced as DDT in 1942 during World War II, and its subsequent use is responsible for saving millions of lives from vectored diseases, such as typhus and malaria. It is partially banned today because of its potential negative impacts on human health (and on the environment), such as breast & other cancers, male infertility, miscarriages and low birth weight, developmental delay and nervous system & liver damage. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Chromium</h4>
                                    <p class="mb-2 pb-75">Chromium is a heavy metal mainly used in metal alloys such as stainless steel and in the chemical industry and refractory and foundry industries. Hexavalent chromium is used for the production of stainless steel, textile dyes, wood preservation, leather tanning, and as anti-corrosion and conversion coatings. It is very toxic and mutagenic when inhaled, has carcinogenic properties, and can cause allergies. In the European Union, the use of hexavalent chromium in electronic equipment is largely prohibited by the RoHS Directive. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Clean Clothes Campaign (CCC)</h4>
                                    <p class="mb-2 pb-75">The Clean Clothes Campaign (CCC) is an alliance of organizations in 15 European countries dedicated to improving working conditions and supporting the empowerment of workers in the global garment and sportswear industries. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Clean Development Mechanism (CDM)</h4>
                                    <p class="mb-2 pb-75">The Clean Development Mechanism (CDM) is part of the Kyoto Protocol and is designed to facilitate international financing of reductions of GHGs in developing countries, which do not have quantitative emissions targets under the Protocol. The CDM allows companies from developed countries to reduce their emissions through the acquisition of ‘certified emissions reductions’ (CERs) while providing developing countries with technology that will reduce their emissions. Diverse range of projects include: renewable energy, GHG capture (e.g. HFC), and reforestation. Over 3500 CDM projects have been registered so far and 3300 remain at validation stage. </p>
                                </div>
                                <div class="search_content">
                                    <h4>CleanGredients</h4>
                                    <p class="mb-2 pb-75">CleanGredients is an online database of chemical products used primarily to formulate residential, institutional, industrial, and janitorial cleaning products that have been pre-approved to meet the U.S. EPA's Safer Choice Standard. It is a purchasing resource for formulators who are seeking to find suppliers selling chemical ingredients that will help them to obtain the Safer Choice label in a manner that reduces risk to their business, saves them money, and gets their products to market faster. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Clean-in-Place (CIP)</h4>
                                    <p class="mb-2 pb-75">Clean-in-Place (CIP) is a method of cleaning the interior surfaces of pipes, vessels, process equipment, filters and associated fittings, without disassembly. It is generally integrating during the equipment design, and allows cleaning through a parallel water circuit </p>
                                </div>
                                <div class="search_content">
                                    <h4>Climate Disclosure Leadership Index (CDLI)</h4>
                                    <p class="mb-2 pb-75">The Climate Disclosure Leadership Index (CDLI) is comprised of companies that have had their climate disclosures independently assessed and ranked against CDP’s widely-respected scoring methodology. To qualify for inclusion in the leadership index, a company has to make its response public, and show high-quality disclosure as a top scoring company, in order to reveal which companies around the world are doing the most to combat climate change. [Source: CDP] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Closed Loop Water Cooling System</h4>
                                    <p class="mb-2 pb-75">A closed loop water cooling system is a closed circulation system which allows for zero water discharge. The system reuses the contaminated water accumulated in buildings, industrial plants and facilities as a coolant. Water cooling is commonly used for large industrial facilities such as steam electric power plants, hydroelectric generators, petroleum refineries and chemical plants. </p>
                                </div>
                                <div class="search_content">
                                    <h4>CO2 Exchange Trading Scheme</h4>
                                    <p class="mb-2 pb-75">These types of schemes refer to the trading of carbon, such as the EU Emissions Trading System. It can act as a tool to reduce industrial greenhouse gas emissions, including CO2 in a cost-effective manner. Companies can receive, buy, or trade allowances - limiting the total number allows for value as well as overall limiting of emissions. Decreasing the number on a regular basis will lead to lowering of emissions long term. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Code of Ethics</h4>
                                    <p class="mb-2 pb-75">A code of ethics is a written set of guidelines issued by an organization to its workers and management to help them conduct their actions in accordance with its primary values and ethical standards. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Coercive Monopoly</h4>
                                    <p class="mb-2 pb-75">A coercive monopoly is a business situation in which competitors cannot enter a market, with the natural result being that the firm established is able to make pricing and operate in a given sector without any influence from competitive forces. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Cogeneration</h4>
                                    <p class="mb-2 pb-75">Cogeneration is a system that continuously and simultaneously generates at least two different forms of energy from a single fuel source. The electricity generator recovers and reuses its own waste heat from combustion of processed natural gas or petroleum gas. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Combined Heat and Power (CHP)</h4>
                                    <p class="mb-2 pb-75">A combined heat and power (CHP) or cogeneration plant generates both electricity and heat in the same process. A CHP system captures some or all of the by-product heat for heating purposes. Such systems are common in pulp and paper mills, refineries and chemical plants. In Europe, the Combined Heat and Power Directive promotes the use of cogeneration in order to increase the energy efficiency and improve the security of energy supply. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Communication on Progress (COP)</h4>
                                    <p class="mb-2 pb-75">The Communication on Progress (COP) is a mandatory report published by companies that are UN Global Compact participants. A COP demonstrates a participant’s advancements against the 10 Principles of the Global Compact and reiterates a strategic commitment to abide by those principles. Companies that do not publish a COP within two years in a row are delisted from the list of Global Compact participants. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Composting Rate</h4>
                                    <p class="mb-2 pb-75">The composting rate is equal to [(tonnage of source-separated organic materials collected for composting)/(tonnage of waste generated, composted, recycled, disposed)]. [Source: www.epa.gov] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Compressed Natural Gas (CNG)</h4>
                                    <p class="mb-2 pb-75">Compressed natural gas (CNG) is a readily available alternative to gasoline that is made by compressing natural gas to less than 1% of its volume at standard atmospheric pressure. Consisting mostly of methane, CNG is odorless, colorless and tasteless. It is drawn from domestically drilled natural gas wells or in conjunction with crude oil production. It costs about 50% less than gasoline or diesel, emits up to 90% fewer emissions than gasoline, and currently is in abundance in many countries. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Conflict Minerals</h4>
                                    <p class="mb-2 pb-75">Conflict minerals are minerals originating from mines in the eastern region of the Democratic Republic of the Congo (DRC) and adjoining countries, which are prone to armed conflict and human rights abuses. There are four minerals of concern: Tungsten, Tantalum, Tin, and Gold (3T&G). They are commonly used in the production of various goods such as electronic devices, automobiles and jewelry. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Convention on International Trade in Endangered Species of Wild Fauna and Flora (CITES)</h4>
                                    <p class="mb-2 pb-75">CITES (the Convention on International Trade in Endangered Species of Wild Fauna and Flora) is an international agreement between governments. Its aim is to ensure that international trade in specimens of wild animals and plants does not threaten their survival. CITES is an international agreement to which states adhere voluntarily and have to adopt their own domestic legislation to ensure that CITES is implemented at the national level. [Source: cites.org] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Corrective Action Plan</h4>
                                    <p class="mb-2 pb-75">A corrective action plan is step-by-step plan of action and schedule for correcting a process issue in an organization. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Corruption (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Corruption is one of the EcoVadis criteria that assesses policies and measures taken by companies that deal with all forms of corruption issues at work, including, among other things, extortion, bribery, conflict of interest, fraud, money laundering. </p>
                                </div>
                                <div class="search_content">
                                    <h4>CSR</h4>
                                    <p class="mb-2 pb-75">Corporate Social Responsibility (or alternatively Corporate Citizenship or Corporate responsibility) is a “concept whereby companies voluntarily integrate economic, social and environmental concerns in their business operations and in interactions with their stakeholders on a voluntary basis”. [Source: European Commission] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Cullet Ratio</h4>
                                    <p class="mb-2 pb-75">This ratio is the amount of recycled glass entering the manufacturing process reported to the amount of new materials (%). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Customers Health & Safety (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">The protection of customer/consumer health and safety is one of the criteria assessed by EcoVadis. It deals with the potential negative health and safety impacts of products and services on customers or consumers. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="d" aria-labelledby="d-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Data Life Cycle Management (DLCM)</h4>
                                    <p class="mb-2 pb-75">Data Life Cycle Management (DLCM) is the process of managing business information throughout its lifecycle, from requirements through retirement. The lifecycle crosses different application systems, databases and storage media. By managing information properly over its lifetime, organizations are better equipped to reduce risks, reduce costs, and promote business agility. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Demand Management Policy</h4>
                                    <p class="mb-2 pb-75">Demand management policies are policies that were argued to be used to control the level of demand in the economy. If there is a shortage of demand, governments should aim to boost demand, and when there is an excess demand, they should do the opposite. The government should be aiming to do the opposite of the trade cycle, and this strategy is used to prevent overheating of the economy or kick-start the economy if there is recession. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Direct Emissions</h4>
                                    <p class="mb-2 pb-75">Direct emissions come from sources that are owned or controlled by the reporting organization. For example, direct emissions related to combustion would arise from burning fuel for energy within the reporting organization’s operational boundaries. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Discrimination (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Discrimination is defined as different treatment given to people in hiring, remuneration, access to training, promotion, termination or retirement based on race, caste, national origin, religion, disability, gender, sexual orientation, union membership, political affiliation or age. Discrimination is one of EcoVadis criteria which assesses policies and measures taken by companies to avoid and eliminate discrimination in the workplace. [Source: ILO Convention (No.111) Discrimination (Employment and Occupation)] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Diversity Charter</h4>
                                    <p class="mb-2 pb-75">The Diversity Charter is a written commitment that can be signed by any company that wishes to ban discrimination in the workplace and improve the degree to which their workforce reflects the diversity of society. The French Diversity Charter’s six articles guide companies through the process of instituting new practices by involving all of their employees and partners in these actions. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Dumping</h4>
                                    <p class="mb-2 pb-75">Dumping is a term used in the context of anti-competitive practices, and it occurs when goods are exported at a price lower than their normal value, generally meaning they are exported cheaper than they are sold in the domestic market or third-country markets, or at less than production cost. [Source: WTO]</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="e" aria-labelledby="e-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Eco-design</h4>
                                    <p class="mb-2 pb-75">Eco-design is an approach to design of products or processes with special consideration for the environmental impacts associated with a product during its whole lifecycle from acquisition of raw materials to end of life. Eco-design seeks to improve the aesthetic and functional aspects of the product with due considerations to social and ethical needs. Expression such as design for environment, green engineering, and sustainable product design can be used alternatively.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Eco-driving</h4>
                                    <p class="mb-2 pb-75">Eco-driving is a driving style aiming at limiting CO2 emissions and fuel consumption in a more economical way. Techniques that drivers can use include for example slowing down and speed monitoring, reduction of idling emissions, and smooth acceleration</p>
                                </div>
                                <div class="search_content">
                                    <h4>Eco-efficiency</h4>
                                    <p class="mb-2 pb-75">Eco-efficiency is a concept that integrates economics and ecology. It implies creating more value (goods and services) with ever less impact (use of resources, waste and pollution). Eco-efficiency also involves finding new solutions through creativity and innovation. [Source: WBCSD] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Ecolabel</h4>
                                    <p>Ecolabels are granted to consumer products by certificating agencies. They guarantee that the product has a mitigated impact on the environment and/or take into account social issues. </p>
                                    <p>TYPE I : can be part of a national or regional scheme or a voluntary third-party scheme run by an independent body. Examples include “Blue Angel” (German), Eco-mark (Japan), European Eco-label (European Commission), Green Seal (USA) </p>
                                    <p>TYPE II: self-declared claims or marketing claims with no third-party certification, sometimes only controlled by misleading advertising laws </p>
                                    <p class="mb-2 pb-75">TYPE III: quantified environmental data for a product with pre-set categories of parameters based on standards; provide data on key environmental aspects of products in a format that facilitates comparison of different products by purchasers [Source: www.globalecolabelling.net] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Eco-Management and Audit Scheme (EMAS)</h4>
                                    <p class="mb-2 pb-75">The Eco-Management and Audit Scheme (EMAS) is the EU voluntary instrument which acknowledges organizations that evaluate, report, and improve their environmental performance on a continuous basis. EMAS III is comprised of six environmental core indicators including energy efficiency, material efficiency, water, waste, biodiversity, and GHG/air emissions. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Electrical and Electronic Equipments (EEE)</h4>
                                    <p class="mb-2 pb-75">Electrical and Electronic Equipment (EEE) is defined as equipment which is dependent on electric currents or electromagnetic fields in order to work properly and equipment for the generation, transfer and measurement of such currents and fields. As a general rule, if it has a battery or needs a power supply to work properly, it is EEE and there are structures in place to reuse/recycle this equipment when it reaches end-of-life. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Electromagnetic Emission (EMR)</h4>
                                    <p class="mb-2 pb-75">An electromagnetic emission or radiation (EMR) is a traveling wave motion resulting from changing electric or magnetic fields. Examples are gamma rays, x-rays, ultraviolet radiation, light, infrared radiation and radiofrequency radiation. The effect of electromagnetic radiation upon living cells, including those in humans, depends upon the power and the frequency of the radiation. For instance, the electromagnetic fields produced by mobile phones are classified by the International Agency for Research on Cancer as possibly carcinogenic to humans. [Source: WHO] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Electronic Product Environmental Assessment Tool (EPEAT)</h4>
                                    <p class="mb-2 pb-75">The Electronic Product Environmental Assessment Tool (EPEAT) is a method for consumers, purchasers, manufacturers, and resellers to evaluate the effect of a product on the environment. It assesses lifecycle environmental standards and ranks products based on a set of environmental performance criteria. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Elemental chlorine free (ECF)</h4>
                                    <p class="mb-2 pb-75">Elemental chlorine free (ECF) is a technique used in the paper industry. ECF papers are produced from pulp that has been bleached with a chlorine derivative such as chlorine dioxide (ClO2) instead of elemental chlorine gas which has a negative effect on the formation of dioxins and dioxin-like compounds. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Employee Health & Safety (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Employee health & safety is one of the EcoVadis criteria which assess measures taken by companies to mitigate the health and safety risks taken by employees. The criteria deals with health and safety issues encountered by employees at the workplace (e.g. during operations and transport). It includes both physiological and psychological issues arising from, among others, dangerous equipment, work practices and hazardous substances. </p>
                                </div>
                                <div class="search_content">
                                    <h4>End Child Prostitution and Trafficking (ECPAT)</h4>
                                    <p>The Code of Conduct for the Protection of Children from Sexual Exploitation in Travel and Tourism (EPCAT Code) addresses the tourism industry's responsibility in combating the sexual exploitation of children. </p>
                                    <p class="mb-2 pb-75">ECPAT is an international non-governmental organization (NGO) and network headquartered in Thailand which is designed to end commercial sexual exploitation of children. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Endangered Species</h4>
                                    <p class="mb-2 pb-75">Endangered species are species of plants and animals whose numbers have fallen to extremely low levels and which are in danger of extinction. The annually updated IUCN Red List of Threatened Species evaluates the conservation status of plant and animal species worldwide. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Energy Consumption & GHG (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">This EcoVadis criteria assesses the measures taken by companies to reduce energy consumption from operations and minimize emission of greenhouse gases. Energy consumption covers different type of energies (e.g. electricity, fuel, renewable energies) used during operations and transport. Greenhouse gases includes direct and indirect emissions including CO2, CH4, N2O, HFC, PFC and SF6. This criteria also includes the production of renewable energy by the company. </p>
                                </div>
                                <div class="search_content">

                                    <h4>Energy Star</h4>
                                    <p class="mb-2 pb-75">Energy Star is a US government program, which helps businesses and individuals protect the environment through superior energy efficiency. The standard was adopted in other countries (e.g. EU, New-Zealand and Australia). Devices carrying the Energy Star label can include computer products, kitchen appliances, buildings and other products. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Energy-Using Products (EuPs)</h4>
                                    <p class="mb-2 pb-75">Energy-using products (EUPs) include products such as boilers, computers, televisions, transformers, industrial fans, industrial furnaces, which use, generate, transfer or measure energy (electricity, gas, fossil fuels). At the European Union level, the Energy-Using Products (EuP) Directive 2005/32/EC was recast in 2009 into the Eco-Design Directive (2009/125/EC). It establishes a framework to set mandatory ecological requirements for energy-using and energy-related products and covers more than 40 product groups. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Enhanced Environmentally Friendly Vehicle (EEV)</h4>
                                    <p class="mb-2 pb-75">Enhanced environmentally friendly vehicle (EEV) is a term used in the European emission standards for the definition of a "clean vehicle" in the category of vehicles used for the carriage of passengers, comprising more than eight seats. The standard lies between the Euro V and Euro VI levels. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Environmental Impact Assessment (EIA)</h4>
                                    <p class="mb-2 pb-75">An Environmental Impact Assessment (EIA) is the process of identifying, predicting, evaluating and mitigating the biophysical, social, and other relevant effects of development proposals prior to major decisions being taken and commitments made. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Environmental Management System (EMS)</h4>
                                    <p class="mb-2 pb-75">An Environmental Management System (EMS) is a set of processes and practices that enable an organization to reduce its environmental impacts and increase its operating efficiency. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Environmental Product Declaration (EPD)</h4>
                                    <p class="mb-2 pb-75">An environmental product declaration (EPD) is defined as "quantified environmental data for a product with pre-set categories of parameters based on the ISO 14040 series of standards, but not excluding additional environmental information". [Source: ISO Standard 14025] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Environmental Services & Advocacy (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Sustainable Consumption refers to programs implemented by a company to promote the sustainable consumption either of its own products or of services among its customer base. The criteria includes the positive/negative indirect impacts of the use of products and services. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Environmental, Social, and Governance (ESG)</h4>
                                    <p class="mb-2 pb-75">ESG stands for Environmental, Social and Governance. This abbreviation is another term for corporate social responsibility. ESG was coined by financial analysts and investors in the Socially Responsible Investment field in order to include environmental and social aspects as well as corporate governance - alongside economic indicators - in business valuations. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Equator Principles (EPs)</h4>
                                    <p class="mb-2 pb-75">The Equator Principles (EPs) are a credit risk management framework for determining, assessing and managing environmental and social risk in project finance transactions. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Ethical Trading Initiative (ETI)</h4>
                                    <p class="mb-2 pb-75">The Ethical Trading Initiative (ETI) is a not-for-profit alliance of companies, trade unions, and voluntary organizations. Ethical trade means that retailers, brands, and their suppliers take responsibility for improving the working conditions of the people who make the products they sell. ETI's vision is a world where all workers are free from exploitation and discrimination, and enjoy conditions of freedom, security, and equity. [Source: ETI] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Ethylenediaminetetraacetic Acid (EDTA)</h4>
                                    <p class="mb-2 pb-75">EDTA (ethylenediaminetetraacetic acid) is an amino acid compound used in various industries including textile, pulp and paper, food, and health. It is also used as a complexing agent in surface treatment and metal finishing. EDTA is now so overused that it is considered as a persistent organic pollutant. Left alone, it degrades eventually to ethylenediaminetriacetic acid, losing one acidic group and becoming toxic. </p>
                                </div>
                                <div class="search_content">
                                    <h4>EU Batteries Directive</h4>
                                    <p class="mb-2 pb-75">The EU Batteries Directive intends to contribute to the protection, preservation and improvement of the quality of the environment by minimizing the negative impact of batteries and accumulators. It also ensures the smooth functioning of the internal market by harmonizing market requirements, and it applies to almost all sizes, natures, and designs. The Directive prohibits the marketing of batteries containing some hazardous substances, defines schemes and targets aimed at collection and recycling, and sets out provisions on labelling. It also aims to improve the environmental performance of all operators involved in the life cycle of batteries and accumulators, as well as in the treatment and recycling of waste batteries and accumulators. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Euro III</h4>
                                    <p>Euro III is a European emission standards for heavy duty vehicles that comply with the emission limits as defined in Directive 98/69/EC. </p>
                                    <p class="mb-2 pb-75">‘Euro III’ vehicle emissions of carbon monoxide must not exceed 2.1 g/kWh, hydrocarbons &lt;0.66 g/kWh, nitrogen oxides &lt;5.0 g/kWh, particulates &lt;0.10 g/kWh, and exhaust gas &lt;0.8 m<sup>-1</sup>.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Euro IV</h4>
                                    <p class="mb-2 pb-75">‘Euro IV’ heavy-duty vehicles must comply with the emission limits as defined in Directive 98/69/EC, which went into effect in 2005. ‘Euro IV’ vehicle emissions of carbon monoxide must not exceed 1.5 g/kWh, hydrocarbons &lt;0.46 g/kWh, nitrogen oxides &lt;3.5 g/kWh, particulates &lt;0.02 g/kWh, and exhaust gas &lt;0.5 m<sup>-1</sup>.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Euro V</h4>
                                    <p class="mb-2 pb-75">‘Euro V’ heavy-duty vehicles must comply with the emission limits as defined in Regulation 715/2007, which went into effect in 2009 for light commercial vehicles. ‘Euro V’ vehicle emissions of carbon monoxide must not exceed 1.5 g/kWh, hydrocarbons &lt;0.46 g/kWh, nitrogen oxides &lt;2.0 g/kWh, particulates &lt;0.02 g/kWh, and exhaust gas &lt;0.5 m<sup>-1</sup>.</p>
                                </div>
                                <div class="search_content">
                                    <h4>Euro VI</h4>
                                    <p class="mb-2 pb-75">The upcoming Euro VI standards set air emission limits for heavy-duty vehicles (buses and trucks) as defined in Regulation (CE) No 595/2009. Euro VI emissions for new type approvals will apply starting on 31 December 2012 (and new registrations from 1 January 2014). ‘Euro VI’ vehicle emissions of carbon monoxide must not exceed 1.5 g/kWh, hydrocarbons &lt;0.13 g/kWh, nitrogen oxides &lt;0.4 g/kWh, particulates matter &lt;0.01 g/kWh.</p>
                                </div>
                                <div class="search_content">
                                    <h4>European Association of Communications Agencies (EACA)</h4>
                                    <p class="mb-2 pb-75">The European Association of Communications Agencies (EACA) is a Brussels-based organization whose mission is to represent full-service advertising and media agencies and agency associations in Europe. It aims to promote ethical advertising through standards, and awareness of the contribution of advertising in a free market economy and encourages close co-operation between agencies, advertisers and media in European advertising bodies.</p>
                                </div>
                                <div class="search_content">
                                    <h4>European Ecolabel</h4>
                                    <p class="mb-2 pb-75">EU Ecolabel helps to identify products and services that have a reduced environmental impact throughout their life cycle, from the extraction of raw material to production, use and disposal. Recognised throughout Europe, EU Ecolabel is a voluntary label promoting trusted, environmental excellence. EU Ecolabel products are evaluated by independent experts to ensure they meet criteria that reduce their environmental impact. </p>
                                </div>
                                <div class="search_content">
                                    <h4>European Forum for Responsible Drinking (EFRD)</h4>
                                    <p class="mb-2 pb-75">The European Forum for Responsible Drinking (EFRD) is an alliance of Europe’s leading spirits companies driving the industry’s commitment to promote responsible drinking in the EU and encouraging industry to adopt responsible self-regulatory standards for commercial communications. </p>
                                </div>
                                <div class="search_content">
                                    <h4>European Promotional Products Association (EPPA)</h4>
                                    <p class="mb-2 pb-75">The European Promotional Products Association (EPPA) was established in 1999 as an umbrella organisation for the European promotional product market. Its membership consists of associations representing suppliers (manufacturers, importers) and distributors (promotional product traders and consultants). EPPA's primary concern is to shape the basic political, social and economic conditions of the European promotional product market. Its current member companies, from 11 European countries, amount to over 8,000 businesses from the promotional product sector. </p>
                                </div>
                                <div class="search_content">
                                    <h4>European Union Emissions Trading System (EU ETS)</h4>
                                    <p class="mb-2 pb-75">The European Union Emissions Trading System (EU ETS) is a tool of the European Union's policy for reducing industrial greenhouse gas emissions and to combat climate change. It is the first and biggest international scheme for the trading of greenhouse gas emission allowances. The EU ETS covers some 11,000 power stations and industrial plants in 30 countries </p>
                                </div>
                                <div class="search_content">
                                    <h4>European Union Timber Regulation (EUTR)</h4>
                                    <p class="mb-2 pb-75">The European Union Timber Regulation puts obligations on businesses who trade in timber and timber-related products. It applies to timber originating in the domestic (EU) market, as well as from third (non-EU) countries. Operators and traders of timber each have a set of responsibilities including the implementation of a due diligence system, risk assessment, supplier record maintenance, etc. </p>
                                </div>
                                <div class="search_content">
                                    <h4>European Works Council (EWC)</h4>
                                    <p class="mb-2 pb-75">A European Works Council (EWC) is a body that communicates information from management to employees. The EWC ensures that decisions that are made in one participating state that affect the employees in another participating state will be communicated to all workers. The European Work Council Directive (94/45/EC) gives representatives of workers from all European countries in large multinational companies a direct line of communication to top management. It applies to all companies with 1,000 or more workers, and at least 150 employees in each of two or more EU Member States. </p>
                                </div>
                                <div class="search_content">
                                    <h4>E-Waste</h4>
                                    <p class="mb-2 pb-75">E-Waste for short - or Waste Electrical and Electronic Equipment (WEEE) - is the term used to describe old, end-of-life or discarded electronic appliances. It includes computers, consumer electronics, refrigerators, etc which have been disposed by their original users (by extension, all types of waste containing electrically powered components). E-Waste contains both valuable materials as well as hazardous materials which require special handling and recycling methods. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Extractive Industries Transparency Initiative (EITI)</h4>
                                    <p class="mb-2 pb-75">The Extractive Industries Transparency Initiative (EITI) is a coalition of governments, companies, civil society groups, investors and international organizations that supports improved governance in resource-rich countries through the verification and publication of company payments and government revenues from oil, gas and mining. Businesses from the extractives sector (but not exclusively) can become ‘Supporting Companies’. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="f" aria-labelledby="f-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Fair Business Practices (EcoVadis methodology)</h4>
                                    <p class="mb-2 pb-75">Fair business practices concern ethical conduct in an organization's dealings with other organizations. Fair business practice issues arise in the areas of anti-corruption, responsible involvement in the public sphere, fair competition, socially responsible behavior, relations with other organizations and respect for property rights. Ethics is one of EcoVadis four themes, which assesses measures taken by companies to avoid and eliminate corruption, bribery and anti-competitive practices, protect property rights and ensure the truthfulness of marketing messages. [Source: ISO 26000] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Fair Labor Association (FLA)</h4>
                                    <p class="mb-2 pb-75">The Fair Labor Association (FLA) is a non-profit organization that aims to protect workers’ rights and improve working conditions worldwide by promoting international labor standards in supply chains. Companies that join the FLA commit to upholding the FLA Workplace Code of Conduct, which is based on International Labour Organization standards, and to establishing internal systems for monitoring workplace conditions and maintaining code standards throughout their supply chains. The FLA monitors factories all over the world through performance reviews, verification of remediation initiatives, and an evaluation of internal protocols and auditing, as well as training. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Fair Trade</h4>
                                    <p class="mb-2 pb-75">The term Fair Trade defines “a trading partnership, based on dialogue, transparency and respect, that seeks greater equity in international trade. It contributes to sustainable development by offering better trading conditions to, and securing the rights of, marginalized producers and workers – especially in developing countries.” Fair Trade ensures that producers in poor countries get a fair price for their goods (one which covers production costs and provides a living income), decent working terms and conditions and longer term contracts that provide security. [Source: FairTrade International] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Forced Labor (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">The International Labor Organisation defines forced or compulsory labor as “all work or service which is exacted from any person under the menace of any penalty and for which the said person has not offered himself voluntarily” (e.g. service is demanded as a means of repayment of debt). Forced labor also includes all form of slave labor. Forced labor is one of EcoVadis criteria, which assesses measures taken by companies to avoid and eliminate forced labor. [Source: C29 Forced Labor Convention, 1930] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Foreign Corrupt Practices Act of 1977 (FCPA)</h4>
                                    <p class="mb-2 pb-75">The Foreign Corrupt Practices Act of 1977 (FCPA) is a United States federal law that prohibits U.S. corporations from offering or paying anything of value to a “foreign official” in order to obtain or retain business or gain a business advantage. Corporations under national and international jurisdiction of the FCPA are the ones that issue securities registered in the United States or who are required to file periodic reports with the Securities & Exchange Commission (SEC), Foreign Companies with ADRs listed on U.S. exchanges, U.S. based private companies, and employees of these entities </p>
                                </div>
                                <div class="search_content">
                                    <h4>Forest Law Enforcement, Governance and Trade (FLEGT)</h4>
                                    <p class="mb-2 pb-75">The European Union's FLEGT Action Plan was established in 2003. It aims to reduce illegal logging by strengthening sustainable and legal forest management, improving governance and promoting trade in legally produced timber. The Action Plan sets out measures to prevent the import of illegal timber into the EU, improve the supply of legal timber, and increase demand for timber from responsibly managed forests. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Forest Stewardship Council (FSC)</h4>
                                    <p class="mb-2 pb-75">The Forest Stewardship Council (FSC) is an international not for-profit organization, which promotes responsible management of the world’s forests by directly or indirectly addressing issues such as illegal logging and deforestation. The FSC offers certification and labeling scheme of forest products. FSC accredited certification bodies certify and audit each individual forest management operation. FSC chain of custody (CoC) tracks FSC certified material through the production process including all stages of processing, transformation, manufacturing and distribution. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Fossil Fuels</h4>
                                    <p class="mb-2 pb-75">Fossil fuels are comprised of carbon-based fuels, such as coal, natural gas and petroleum, derived from the decomposed remains of ancient plants and animals, usually underground or in the ocean floor, where they have been under pressure for millions of years. Fossil fuels release carbon dioxide when burned. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Freedom of Association</h4>
                                    <p class="mb-2 pb-75">Workers and employers may establish and join organizations of their own choosing without the need for prior authorization. </p>
                                </div>
                                <div class="search_content">
                                    <h4>FTSE4GOOD Index Series</h4>
                                    <p class="mb-2 pb-75">The FTSE4Good Index Series, which comprises a range of stock market indices, benchmarks the performance of companies that meet globally recognized corporate responsibility standards. [Source: FTSE] </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="g" aria-labelledby="g-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Gas to Liquid (GTL)</h4>
                                    <p class="mb-2 pb-75">Gas to Liquid (GTL) is a refinery process to create liquid fuels such as kerosene and light oil through a chemical reaction with natural gas. The process is still energy consuming but the environmental footprint of synthetic fuels could be improved. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Genetically Modified Organisms (GMOs)</h4>
                                    <p class="mb-2 pb-75">Genetically modified organisms (GMOs) can be defined as organisms in which the genetic material (DNA) has been altered in a way that does not occur naturally by mating or natural recombination. The most common types of GMOs that have been developed and commercialized are genetically modified crop plant species, such as genetically modified corn, soybean, oilseed rape and cotton varieties. In Europe, six Member States are currently applying safeguard clauses on GMO events: Austria, France, Greece, Hungary, Germany and Luxembourg. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Global e-Sustainability Initiative (GESI)</h4>
                                    <p class="mb-2 pb-75">The Global e-Sustainability Initiative (GeSI) is an industry trade association founded in 2001. It aims to further sustainable development in the ICT sector and fosters global and open cooperation, informs the public of its members’ voluntary actions to improve their sustainability performance, and promotes innovative technologies. GeSI’s Electronics Tool for Accountable Supply Chains (E-TASC) is a web-based tool utilized by companies to manage their own factories, communicate with their customers, and assess their suppliers on corporate responsibility risks. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Global Harmonized System (GHS)</h4>
                                    <p class="mb-2 pb-75">The Globally Harmonized System of Classification and Labelling of Chemicals is a system for standardizing and harmonizing the classification and labelling of chemicals. Created by the UN and ILO, it is a comprehensive approach to: defining health, physical, and environmental hazards of chemicals; creating classification processes that use available data on chemicals for comparison with the defined hazard criteria; and communicating hazard information, as well as protective measures, on labels and Safety Data Sheets (SDS). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Global Packaging Project (GPP)</h4>
                                    <p class="mb-2 pb-75">The Global Packaging Project (GPP) by the Consumer Goods Forum is a voluntary effort by some of the largest global retailers and brand owners to develop a common language and common measurement system to communicate and share information about packaging and sustainability. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Global Product Strategy (GPS)</h4>
                                    <p class="mb-2 pb-75">The International Council of Chemical Associations (ICCA) launched the Global Product Strategy (GPS), in 2006, to advance the product stewardship performance of individual companies and the global chemical industry as a whole. The overall objective of this policy framework is that by 2020, chemicals are produced and used in ways that minimize significant adverse impacts on human health and the environment. The GPS is designed to improve the global chemical industry's product stewardship performance by recommending measures to be taken by companies, working together with other companies and associations along the chemical value chain. It builds on the product stewardship elements of industry’s voluntary Responsible Care initiative and aims to improve the safe management of chemicals. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Global Reporting Initiative (GRI)</h4>
                                    <p class="mb-2 pb-75">The Global Reporting Initiative (GRI) produces a sustainability reporting framework to enhance organizational transparency. The Framework, including the Reporting Guidelines, sets out the Principles and Indicators organizations can use to report their economic, environmental, and social performance. The GRI’s mission is to make sustainability reporting by all organizations as routine and comparable as financial reporting. The GRI proposes more than 50 core indicators and additional indicators can be found in the Sector Supplements. It also provides a range of indicators which help define an organization’s sustainability context and reporting quality. GRI reports can be third party audited (e.g. A+ level) or self-declared (e.g. B level). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Global Warming Potential (GWP)</h4>
                                    <p class="mb-2 pb-75">The global warming potential (GWP) is an indicator that allows the comparison of the ability of each greenhouse gas to trap heat in the atmosphere relative to carbon dioxide (CO2) over a specified time horizon. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Good Agricultural Practices (GAP)</h4>
                                    <p class="mb-2 pb-75">Good Agricultural Practices (GAP) are practices that address environmental, economic and social sustainability for on-farm processes, and result in safe and quality food and non-food agricultural products. General principles for GAP were first presented to the Food and Agriculture Organization of the United Nations (FAO) Committee on Agriculture (COAG) in 2003 in a report documenting 'Development of a Framework for Good Agricultural Practices'. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Good Manufacturing Practice (GMP)</h4>
                                    <p class="mb-2 pb-75">The Good manufacturing practice (GMP) guidelines are production and testing procedures used in the medicinal and pharmaceutical industry. The GMPs have been established by many national legislations to ensure a quality of products. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Green Certificates</h4>
                                    <p class="mb-2 pb-75">Green Certificates or Renewable Energy Certificates (RECs) are a tradable commodity proving that certain electricity is generated using renewable energy sources. Green Certificates provide key information about the generation of renewable electricity delivered to the utility grid. Buyers can select Green certificates based on the generation resource (e.g., wind, solar, geothermal). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Green Energy</h4>
                                    <p class="mb-2 pb-75">Green energy includes those that help the earth meet energy needs without depleting the ability to serve in the long term. This can include some types of renewable energies, but renewable energy includes all natural sources of energy which can be replaced by natural ecological cycles. Energy from the sun, wind, or earth's heat can be characterized as green energy but are renewable as they do not have economic impacts and are unlimited. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Green IT</h4>
                                    <p class="mb-2 pb-75">Green information technology (IT) refers to the implementation of environmentally sound information technology, through the use of practices such as designing, manufacturing, using, and disposing of computers, servers, and associated subsystems efficiently and effectively so as to minimize or eliminate environmental impacts. It can also include such practices as the use of renewable energy sources for IT purposes, server virtualization, optimized data centers, energy-efficient computing, ecolabelling of IT products, etc. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Green Neighborhood</h4>
                                    <p class="mb-2 pb-75">Urban development project integrating sustainable development objectives, and accepting high level of environmental responsibilities. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Green Seal</h4>
                                    <p class="mb-2 pb-75">Green Seal is a U.S. non-profit, third-party certifier and standards development body. The Green Seal certification ensures that a product meets rigorous, science-based environmental leadership standards. Through its eco-labeling scheme, Green Seal gives manufacturers the assurance to back up their claims and purchasers confidence that certified products are better for human health and the environment. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Greenhouse Gas (GHG)</h4>
                                    <p class="mb-2 pb-75">Greenhouse gases (GHGs) are components of the atmosphere that contribute to the greenhouse effect. Components include CO2, CH4, N2O, HFC, PFC, SF6, which have different global warming potentials (GWP). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Greenhouse Gas Protocol (GHG Protocol)</h4>
                                    <p>The Greenhouse Gas Protocol (GHG Protocol) is an international accounting tool for greenhouse gas emissions. It is the result of a partnership between the World Resources Institute (WRI) and the World Business Council for Sustainable Development (WBCSD). </p>
                                    <p>The GHG Protocol Corporate Standard provides standards and guidance for companies and other organizations preparing a GHG emissions inventory. It covers the accounting and reporting of the six greenhouse gases covered by the Kyoto Protocol including CO2, methane, nitrous oxide, HFCs, PFCs, and Sulphur hexafluoride (SF6). Emissions are categorized into three broad scopes: </p>
                                    <ul class="mb-2 pb-75">
                                        <li>Scope 1: All direct GHG emissions. </li>
                                        <li> Scope 2: Indirect GHG emissions from consumption of purchased electricity, heat or steam. </li>
                                        <li>Scope 3: Other indirect emissions, such as the extraction and production of purchased materials and fuels, outsourced activities, waste disposal, etc. </li>
                                    </ul>
                                </div>
                                <div class="search_content">
                                    <h4>Greenpeace Cool IT Challenge Leaderboard</h4>
                                    <p class="mb-2 pb-75">The Cool IT Leaderboard, issued by Greenpeace International and launched in 2009, establishes a scoring system that analyzes IT companies' contributions to achieving global greenhouse gas emissions reductions of 15 percent by 2020. It is updated annually and tracks the progress of the largest IT brands in three key areas: technological climate solutions, global warming emissions, engagement in political advocacy. [Source: Greenpeace] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Greenwashing</h4>
                                    <p class="mb-2 pb-75">Greenwashing is an overstated, misleading claim about the environmental and social benefits of a product, service or technology offered by a firm. For example, a corporation can promote green-based environmental initiatives but actually operate in a way that is detrimental to the environment. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Greywater</h4>
                                    <p class="mb-2 pb-75">Greywater is gently used water from sinks, showers, tubs, and washing machines, but that has not come into contact with hazardous or fecal materials. Greywater may contain traces of dirt, food, grease, hair, and certain materials as a result of various processes. Reusing greywater can be a sustainable water management practice, as keeping it out of the sewer or septic system, can reduce local pollution of water bodies. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Guidelines on Sustainability for the Chemical Industry in Germany</h4>
                                    <p class="mb-2 pb-75">The Sustainability Initiative of the German Chemical Industry Chemie is based on twelve sustainability guidelines which aim to underpin sustainability as a guiding principle of the chemical industry in this country. As a sector-specific umbrella, the guidelines provide orientation for enterprises and their workforces. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="h" aria-labelledby="h-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Halogenated compounds</h4>
                                    <p class="mb-2 pb-75">Halogenated compounds (or organic halides) are non-metal compounds such as including fluorine, chlorine, bromine, iodine, and astatine. The more halogenated a chemical compound (i.e., the more halogens attached to it), the more resistant it is to biodegradation. Halogenated compounds are used in solvents, plastic and polymer intermediates, insecticides, fumigants, refrigerants, additives for gasoline, and materials used in fire extinguishers. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Hazard Analysis and Critical Control Points (HACCP)</h4>
                                    <p class="mb-2 pb-75">Hazard Analysis and Critical Control Points (HACCP) is a quality management system in which food and pharmaceuticals safety is addressed through the analysis and control of biological, chemical, and physical hazards from raw material production, procurement and handling, to manufacturing, distribution and consumption of the finished product. [Source: U.S. FDA] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Heavy Metals</h4>
                                    <p class="mb-2 pb-75">Heavy metals are metals and metal compounds with high molecular weights, often resulting from industrial processes (batteries, televisions, paints, ink) and generally toxic to animal life and human health if naturally occurring concentrations are exceeded. Examples include arsenic, chromium, lead, and mercury. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Hexavalent Chromium</h4>
                                    <p class="mb-2 pb-75">Hexavalent chromium is usually produced by an industrial process and is known to cause cancer. In addition, it targets the respiratory system, kidneys, liver, skin and eyes. Chromium metal is added to alloy steel to increase hardenability and corrosion resistance. A major source of worker exposure occurs during "hot work" such as welding on stainless steel and other alloy steels containing chromium metal. Hexavalent chromium compounds may be used as pigments in dyes, paints, inks, and plastics. It also may be used as an anticorrosive agent added to paints, primers, and other surface coatings. </p>
                                </div>
                                <div class="search_content">
                                    <h4>High Production Volume Information System (HPVIS)</h4>
                                    <p class="mb-2 pb-75">The High Production Volume Information System (HPVIS) is a database that provides access to health and environmental effects of chemicals produced or imported into the United States in quantities of 1 million pounds or more per year. </p>
                                </div>
                                <div class="search_content">
                                    <h4>High Quality Environmental Standard (HQE)</h4>
                                    <p class="mb-2 pb-75">Heavy metals are metals and metal compounds with high molecular weights, often resulting from industrial processes (batteries, televisions, paints, ink) and generally toxic to animal life and human health if naturally occurring concentrations are exceeded. Examples include arsenic, chromium, lead, and mercury.The High Quality Environmental standard (HQE) is a standard for green building in France. The standard specifies criteria for outdoor environmental impacts (e.g. nuisance by the construction sites, waste minimization, water management, energy use) and indoor environment quality (e.g. acoustic control measures, hygiene and cleanliness, ambient air, water controls). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Human Rights (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">It is one of EcoVadis criteria which assesses policies and measures taken by companies to deal with fundamental human rights issues at work. This includes the respect of security, property rights, employees privacy rights, civil and political rights, rights to freedom of association and collective bargaining, social and cultural rights (including indigenous people) as well as the prevention of harassment, moral and physical violence and inhumane or degrading treatment. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Human Rights Impact Assessment (HRIA)</h4>
                                    <p class="mb-2 pb-75">A Human Rights Impact Assessment (HRIA) is a process for systematically identifying, predicting and responding to the potential human rights impacts of the policies, practices, procedures and priorities of government, public and private bodies. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Hydrochlorofluorocarbons (HCFC)</h4>
                                    <p class="mb-2 pb-75">Hydrochlorofluorocarbons or HCFCs are organic gases used as refrigerants and propellants in aerosols. They are greenhouse gases with high global warming potential (124 to 14,800 times C02 emissions depending of the specific type of gas). Under the Montreal Protocol on Substances that Deplete the Ozone Layer, parties have agreed to set year 2013 as the time to freeze the consumption and production of HCFCs. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="i" aria-labelledby="i-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>ILO-OSH 2001</h4>
                                    <p class="mb-2 pb-75">ILO-OSH 2001 guidelines call for coherent policies to protect workers from occupational hazards and risks while improving productivity. They present practical approaches and tools for assisting organizations, competent national institutions, employers, workers and other social partners in establishing, implementing and improving occupational safety and health management systems, with the aim of reducing work-related injuries, ill health, diseases, incidents and deaths. [Source: ILO] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Imprim'Vert</h4>
                                    <p class="mb-2 pb-75">Imprim'Vert is a French ecolabel which outlines environmental specifications for the printing industry. To use the trademark, printers must follow specifications that cover waste, toxic products, hazardous liquids and energy use. A third party, Pôle d'Innovation de l'Imprimerie, verifies the specifications are upheld by the printing companies. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Indirect Emissions</h4>
                                    <p class="mb-2 pb-75">Emissions that result from the activities of the reporting organization but are generated at sources owned or controlled by another organization. In the context of this Indicator, indirect emissions refer to greenhouse gas emissions from the generation of electricity, heat, or steam that is imported and consumed by the reporting organization. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Industrial Ecology</h4>
                                    <p class="mb-2 pb-75">Industrial Ecology is a field of study in which manufacturing systems are approached taking into consideration available material and energy flows and natural resources. For example, resource and capital investments are studied in a closed loop system where waste become input for new processes. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Insider Trading</h4>
                                    <p class="mb-2 pb-75">Insider trading occurs when someone makes an investment decision based on information that is not available to the general public. In some cases, the information allows them to profit, in others, to avoid a loss. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Integrated Multi-Trophic Aquaculture (IMTA)</h4>
                                    <p class="mb-2 pb-75">Integrated multi-trophic aquaculture is a way to improve the productivity and environmental sustainability of marine aquaculture practices, through examining the economic and environmental benefits of growing fish, shellfish, and marine plants together. IMTA borrows its concept from nature; namely, that in the food chain, one species always finds a feeding niche in the waste generated by another species. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Association for Soaps, Detergents, and Maintenance Products (AISE) Charter for Sustainable Cleaning</h4>
                                    <p class="mb-2 pb-75">This charter is a voluntary initiative of the European soaps, detergents and maintenance products industry. It provides a lifecycle analysis (LCA) based framework. It promotes and facilitates a common industry approach to sustainability practice and reporting. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Chamber of Commerce Charter on Sustainable Development</h4>
                                    <p class="mb-2 pb-75">The International Chamber of Commerce (ICC) Business Charter for Sustainable Development consists of 16 principles on environmental management. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Chamber of Commerce International Code of Advertising Practice</h4>
                                    <p class="mb-2 pb-75">The International Chamber of Commerce (ICC) Code of Advertising practices promotes high standards of ethics in marketing and is intended to complement the existing frameworks of national and international law. The Code applies to all advertisements for the promotion of any form of goods and services </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Civil Aviation Organization (ICAO)</h4>
                                    <p class="mb-2 pb-75">The International Civil Aviation Organization (ICAO) is a UN specialized agency, created in 1944 upon the signing of the Convention on International Civil Aviation (Chicago Convention). ICAO works with the Convention’s 191 Member States and global aviation organizations to develop international Standards and Recommended Practices (SARPs) which States reference when developing their legally-enforceable national civil aviation regulations. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Council of Toy Industries Code of Business Practices</h4>
                                    <p class="mb-2 pb-75">The International Council of Toy Industries (ICTI) Code of Business Practices establishes commitments for toy factories regarding labor and human rights issues. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Food Standard (IFS)</h4>
                                    <p class="mb-2 pb-75">The International Food Standard (IFS) is a standard based on the auditing of food processing companies or companies that pack loose food products. It covers among others the HACCP system, personnel hygiene, protective clothing, and pest control. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Labor Organization (ILO)</h4>
                                    <p class="mb-2 pb-75">The International Labor Organization (ILO) is a specialized agency of the United Nations that deals with labor issues. The ILO organization seeks to promote employment creation, strengthen fundamental principles and rights at work - workers' rights, improve social protection, and promote social dialogue as well as provide relevant information, training and technical assistance. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Maritime Organization Conventions</h4>
                                    <p class="mb-2 pb-75">The conventions from the International Maritime Organization (IMO), a United Nations agency, aim at improving maritime safety and preventing marine environmental pollution. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Partnership for Premiums and Gifts (IPPAG)</h4>
                                    <p class="mb-2 pb-75">The International Partnership for Premiums and Gifts (IPPAG) is an initiative led by private company IPPAG Global Promotions, based in Switzerland. The company provides full service global solutions for promotional items, with global, regional and national account management and expertise. IPPAG has introduced and implemented a Code of Conduct for IPPAG Members, which include gifts and promotional item wholesalers. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Safety Management (ISM)</h4>
                                    <p class="mb-2 pb-75">The purpose of the International Safety Management Code is to provide an international standard for the safe management of ships and for pollution prevention. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Ship and Port Facility Security (ISPS)</h4>
                                    <p class="mb-2 pb-75">The International Ship and Port Facility Security (ISPS) Code came into force in 2004 for all ships. It is a comprehensive set of measures to enhance the security of ships and port facilities. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Standard Organization (ISO)</h4>
                                    <p class="mb-2 pb-75">ISO stands for the International Standard Organization, an international standard-setting body composed of representatives from various national standards organizations. It is responsible for the ISO 9000, ISO 14000, ISO 50001, ISO 27000, ISO 22000 and other international management standards. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Sustainability and Carbon Certification (ISCC)</h4>
                                    <p class="mb-2 pb-75">International Sustainability and Carbon Certification (ISCC) is one of the leading certification systems for sustainability and greenhouse gas emissions. It is one of the first certification schemes to demonstrate compliance with the EU Renewable Energy Directive’s (RED) requirements. ISCC can be applied to meet legal requirements in the bioenergy markets as well as to demonstrate the sustainability and traceability of feedstock in the food, feed and chemical industries. [Source: ISCC] </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Tin Research Industry Tin Supply Chain Initiative (ITRI iTSCi)</h4>
                                    <p class="mb-2 pb-75">iTSCi is a joint initiative that assists upstream companies (from mine to the smelter) to institute the actions, structures, and processes necessary to conform with the OECD Due Diligence Guidance (DDG) at a very practical level, including small and medium size enterprises, co-operatives and artisanal mine sites. It is designed for use by industry, but with oversight and clear roles for government officials, in keeping with the recently published OECD Due Diligence Guidance for Responsible Supply Chains of Minerals from Conflict-Affected and High-Risk Area. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Uniform Chemical Information Database (IUCLID5)</h4>
                                    <p class="mb-2 pb-75">The International Uniform Chemical Information Database (IUCLID) is a software application to capture, store, maintain and exchange data on intrinsic and hazard properties of chemical substances. The current version of the software is IUCLID5, compliant with REACH obligations. </p>
                                </div>
                                <div class="search_content">
                                    <h4>International Union for the Conservation of Nature and Natural Resources (IUCN)</h4>
                                    <p class="mb-2 pb-75">The International Union for the Conservation of Nature and Natural Resources (IUCN) is a global environmental organization aimed at finding solutions to pressing environmental and development challenges through supporting scientific research, managing field projects, valuing and conserving nature, and helping governments, NGOs, the UN, and companies come together to create best practice policies. The IUCN's Red List is an inventory of the global conservation status of plant and animal species. [Source: IUCN] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Inventory of Existing Chemical Substances Produced or Imported in China (IECSC)</h4>
                                    <p class="mb-2 pb-75">This inventory was created by the Chemical Inspection & Regulation Service (CIRS) and entails over 45,000 chemical substances, updated by the Chinese government. It was originally set up to provide REACH compliance services to the Chinese chemical industry, through new substance notification, registration of import/export of chemicals, registration of chemicals, labeling and classification, etc. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Ionizing Radiation</h4>
                                    <p class="mb-2 pb-75">The Cool IT Leaderboard, issued by Greenpeace International and launched in 2009, establishes a scoring system that analyzes IT companies' contributions to achieving global greenhouse gas emissions reductions of 15 percent by 2020. It is updated annually and tracks the progress of the largest IT brands in three key areas: technological climate solutions, global warming emissions, engagement in political advocacy. [Source: Greenpeace] </p>
                                </div>
                                <div class="search_content">
                                    <h4>ISO 13485</h4>
                                    <p class="mb-2 pb-75">The ISO 13485 standard specifies requirements for a quality management system where an organization needs to demonstrate its ability to provide medical devices and related services that consistently meet customer requirements and regulatory requirements applicable to medical devices and related services. [Source: ISO] </p>
                                </div>
                                <div class="search_content">
                                    <h4>ISO 14001</h4>
                                    <p class="mb-2 pb-75">The ISO 14001 standard belongs to the ISO 14000 series, a family of environmental management standards developed by the International Organization for Standardization (ISO) designed to provide an internationally recognized framework for environmental management, measurement, evaluation and auditing. The ISO 14001 standard serves as a framework to assist organizations in developing their own environmental management system and is based on the continuous Plan-Check-Do-Review-Improve cycle. </p>
                                </div>
                                <div class="search_content">
                                    <h4>ISO 14040</h4>
                                    <p class="mb-2 pb-75">ISO 14040 series concern life cycle assessments, pre-production planning, and environment goal setting. </p>
                                </div>
                                <div class="search_content">
                                    <h4>ISO 22000</h4>
                                    <p class="mb-2 pb-75">ISO 22000 is an international standard, dealing with food safety. It is applicable to all organisms along the food chain. </p>
                                </div>
                                <div class="search_content">
                                    <h4>ISO 22628</h4>
                                    <p class="mb-2 pb-75">This International Standard specifies a method for calculating the recyclability rate and the recoverability rate of a new road vehicle, each expressed as a mass fraction of the vehicle. Under this procedure, performed by the vehicle manufacturer when a new road vehicle is put on the market, potentially, the vehicle can be recycled, reused or both (recyclability rate), or recovered, reused or both (recoverability rate). [Source: ISO] </p>
                                </div>
                                <div class="search_content">
                                    <h4>ISO 27001</h4>
                                    <p class="mb-2 pb-75">ISO 27001 is an Information Security Management System (ISMS) standard. The standard specifies the requirements for establishing, implementing, operating, monitoring, reviewing, maintaining and improving a documented Information Security Management System within the context of the organization's overall business risks. </p>
                                </div>
                                <div class="search_content">
                                    <h4>ISO 28000</h4>
                                    <p class="mb-2 pb-75">The norm ISO 28000 specifies the requirements for a security management system, including those aspects critical to security assurance of the supply chain. Security management is linked to many other aspects of business management. Aspects include all activities controlled or influenced by organizations that impact on supply chain security, also where and when they have an impact on security management, including transporting these goods along the supply chain. [Source: ISO] </p>
                                </div>
                                <div class="search_content">
                                    <h4>ISO 50001</h4>
                                    <p class="mb-2 pb-75">ISO 50001 specifies requirements for establishing, implementing, maintaining and improving an energy management system, whose purpose is to enable an organization to follow a systematic approach in achieving continual improvement of energy performance, including energy efficiency, energy use and consumption. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="j" aria-labelledby="j-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Japan Electronics and Information Technology Industries Association (JEITA) Responsible Minerals Trade Working Group </h4>
                                    <p class="mb-2 pb-75">JEITA has been engaged in promoting CSR throughout the supply chain in the IT and electronics industries. JEITA formally set up the Responsible Minerals Trade Working Group to achieve responsible sourcing of minerals and to deal with the Dodd-Frank Act and other regulations. Actions of the group include planning and implementation of reasonable and effective policies in the interest of JEITA members and cost efficiency, as well as strive to improve Japanese companies' presence in the international society through collaborations with other initiatives (such as EICC and GeSI). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Joint Labor Management Health and Safety Committee</h4>
                                    <p class="mb-2 pb-75">A joint labor management health and safety committee intervenes in the field of the health and safety of employees. It is comprised of employer representatives, employees representatives and specialists of health and safety issues. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="k" aria-labelledby="k-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Key Performance Indicator (KPI)</h4>
                                    <p class="mb-2 pb-75">A Key Performance Indicator (KPI) is a quantifiable business metrics used to define performance against objectives and targets. KPIs also serve as an alert system for possible deviations from pre-established performance goals. For example, KPIs can help companies monitor their performance within the framework of a sustainability management system. KPIs can vary from company to company, depending on the strategy and sector, however standardized sustainability KPIs exist as defined by internationally recognized organizations such as the Global Reporting Initiative. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Keyline Design®</h4>
                                    <p class="mb-2 pb-75">Keyline Design is a system used to build and regenerate degraded soils rapidly, especially when integrated with holistically managed grazing, and can play an important role in maintaining our urban built environment. Developed in Australia in the 1950s, the system of contour subsoil ripping controls rainfall runoff and enables fast flood irrigation of undulating land without the need for terracing. They can include irrigation dams for stock water and farm water, earth channels to broaden the catchment areas of high dams, and ridge lines to provide additional catchment and non-erosive movement across the land. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Kyoto Protocol</h4>
                                    <p class="mb-2 pb-75">The Kyoto Protocol is an international agreement linked to the United Nations Framework Convention on Climate Change. It sets out a series of reduction targets for industrialized nations to meet by 2012. Signatories that formally ratify the Kyoto Protocol will be legally bound to reduce their emissions below 1990 levels by an average of 5%. As of September 2011, 191 states have signed and ratified the protocol. By the end of the first commitment period of the Kyoto Protocol in 2012, a new international framework needs to be implemented. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="l" aria-labelledby="l-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Leadership in Energy and Environmental Design (LEED)</h4>
                                    <p class="mb-2 pb-75">The Leadership in Energy and Environmental Design (LEED), developed by the U.S. Green Building Council (USGBC), provides standards for environmentally sustainable construction. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Level of Criticality</h4>
                                    <p class="mb-2 pb-75">A criticality level is assigned to each weakness/strength for each supplier. It represents the level of importance for a given issues. The higher the criticality level, the more important the stakes (e.g. number of CSR criteria impacted) and the higher the number of check marks or the alert signs for the associated strength or weakness. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Life Cycle Assessment (LCA)</h4>
                                    <p class="mb-2 pb-75">A Life Cycle Assessment (LCA), also known as life cycle analysis, ecobalance, cradle-to-grave-analysis and well-to-wheel analysis is the assessment of the environmental impact of a given product or service throughout its lifespan. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Local & Accidental Pollution (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Local pollution is one of the criteria assessed by EcoVadis. It deals with the impact from operations on local environment around the company facilities which includes emissions of dust, noise and odors. It also includes accidental pollutions (e.g. spills) and road congestion around the operation facilities. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Long-Range Research Initiative (LRI)</h4>
                                    <p class="mb-2 pb-75">The Long-range Research Initiative (LRI) is a research initiative aims at identifying and fill gaps in the understanding of the hazards posed by chemicals and to improve the methods available for assessing the associated risks. [Source: CEFIC-LRI] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Lost Day</h4>
                                    <p class="mb-2 pb-75">Lost days are the number of days that could not be worked, and thus ‘lost’, as a consequence of a worker or workers being unable to perform their usual work because of an occupational accident or disease. A return to limited duty or alternative work for the same organization does not count as lost days. [Source: GRI] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Lost Time Injury</h4>
                                    <p class="mb-2 pb-75">A lost time injury (or lost time accident) is any work related injury or illness which prevents that person from doing any work day after accident. Lost time injuries are defined as occupational accidents that resulted in time lost from work of one day/shift or permanent disability or a fatality. The number of lost time injuries is used to calculate the lost time injury frequency rate (or accident frequency rate). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Lost Workdays</h4>
                                    <p class="mb-2 pb-75">Lost workdays or days lost due to injuries represent the total number of days taken off work due to work-related illness and workplace injuries. The number of days lost is used to calculate the lost time severity rate. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Low-Energy House</h4>
                                    <p class="mb-2 pb-75">A low-energy house refers to any type of house that uses less energy from any source (from design, technologies and building products) than a traditional or average contemporary house. A range of standards have been developed such as Energy Star, Passivhaus, and BBC Effinergie. Low-energy buildings typically imply high levels of insulation, energy efficient windows, low levels of air infiltration, and heat recovery ventilation to lower heating and cooling energy consumption. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="m" aria-labelledby="m-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Marine Stewardship Council (MSC)</h4>
                                    <p class="mb-2 pb-75">The Marine Stewardship Council (MSC) aims at promoting sustainable fishing. It is a world leading certification and ecolabelling program for sustainable seafood. [Source: MSC] </p>
                                </div>
                                <div class="search_content">
                                    <h4>MASE UIC</h4>
                                    <p class="mb-2 pb-75">This Manual for Improvement of Safety in Operating Companies (Manuel d'Amélioration Sécurité des Entreprises) is a common referent for the petrochemicals sector and the UIC (area of chemistry ). It is a HSE management system and part of a process of continuous performance improvement in companies. It is based on five main points: management commitment, competence and professional qualifications of the staff, the preparation and organization of work, monitoring and continuous improvement. Its purpose is to establish a preventive system to avoid accidents and prevent dangerous situations. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Material Safety Data Sheet (MSDS)</h4>
                                    <p class="mb-2 pb-75">A Material Safety Data Sheet (MSDS) is a form which contains data on the properties of a particular substance. It is an important component of workplace safety. MSDSs are required when a substance or preparation is supplied to any user in the European Union if the substance or the preparation contains a substance classified as dangerous or a SVHC, PBT or vPvB. They must be distributed by the manufacturer or distributor of the product. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Materials, Chemicals & Waste (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">This is one of the criteria assessed by EcoVadis. It covers the consumption of all types of raw materials and chemicals as well as non-hazardous and hazardous waste generated from operations. It also includes air emissions other than GHG (e.g. SOx, NOx). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Methanation</h4>
                                    <p class="mb-2 pb-75">Methanation is the reaction by which carbon oxides and hydrogen are converted to methane and water. The reaction is catalysed by nickel catalysts. In industry, there are two main uses for methanation: to purify synthesis gas (i.e. remove traces of carbon oxides) and to manufacture methane. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Mobile Phone Partnership Initiative (MPPI)</h4>
                                    <p class="mb-2 pb-75">The Mobile Phone Partnership Initiative (MPPI) is a convention signed in the frame of Basel Convention. Its objective is to promote ecological management of the end-of-life of cell phones. [Source: Basel Convention] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Mobile Workers</h4>
                                    <p class="mb-2 pb-75">Mobile workers are those who work at least 10 hours per week away from home and from their main place of work, e.g. on business trips, in the field, travelling or on customers’ premises, and use online computer connections when doing so. </p>
                                </div>
                                <div class="search_content">
                                    <h4>MSCI ESG Indexes</h4>
                                    <p class="mb-2 pb-75">MSCI ESG indexes are designed to represent the most prevalent environmental, social and governance (ESG) investment strategies, utilizing MSCI's award-winning ESG data and ratings on thousands of companies worldwide. Institutional investors interested in sustainable investing can use these industry-leading indexes to benchmark ESG investment performance, issue index-based ESG investment products, and manage and report on ESG mandate compliance. [Source: MSCI] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Multimodal Transport</h4>
                                    <p class="mb-2 pb-75">Multimodal transport is the carriage of goods by at least two different modes of transport on the basis of a multimodal transport contract from a place in one country where the goods are taken in charge by the multimodal transport operator to a place designated for delivery situated in a different country (e.g. shipping by rail and delivery by sea). The advantage of the multimodal transport is the use of the most efficient combination of transport modes to keep CO2 emissions or route distance lower than those from single mode transport methods. [Source: UN Multimodal Convention] </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="n" aria-labelledby="n-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>NF Environnement</h4>
                                    <p class="mb-2 pb-75">The NF Environnement mark is a voluntary certification mark issued by AFNOR Certification. This mark, which was created in 1991, is the official French ecological certification. The NF mark is a collective certification mark. It guarantees the quality and safety of the products and services certified. The use of products bearing the NF Environnement mark, as of those marked with the European Eco-label, contributes to ecologically responsible consumer behaviour. </p>
                                </div>
                                <div class="search_content">
                                    <h4>NHS Supply Chain Code of Conduct</h4>
                                    <p class="mb-2 pb-75">The NHS Supply Chain Supplier Code of Conduct sets CSR standards on social, environmental and ethical issues for suppliers of the UK’s National Health Service and healthcare organizations. [Source: NHS Supply Chain] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Non-Governmental Organization (NGO)</h4>
                                    <p class="mb-2 pb-75">A non-governmental organization (NGO) is any non-profit organization, which is not part of a government. Its aim is to advocate for and support private, public or humanitarian interests (e.g. defense of human rights, environment protection, fight against poverty). INGO can also be used for international non-governmental organization. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Nordic Ecolabel</h4>
                                    <p class="mb-2 pb-75">The Nordic Ecolabel is the official ecolabel of the Nordic countries and was established in 1989 by the Nordic Council of Ministers with the purpose of providing an environmental labelling scheme that would contribute to a sustainable consumption. It is a voluntary, positive ecolabelling of products and services. The Nordic Ecolabel was also initiated as a practical tool for consumers to help them actively choose environmentally-sound products. It is an ISO 14024 type 1 ecolabelling system and is a third-party control organ. [Source: Nordic-ecolabel] </p>
                                </div>
                                <div class="search_content">
                                    <h4>NOx</h4>
                                    <p class="mb-2 pb-75">NOx refers to the various oxides of nitrogen (NO, NO2, N2O2, etc.). These chemical compounds are generally emitted during fuel combustion and chemical industry operations, and they can contribute to the acidification of soil and water. </p>
                                </div>
                                <div class="search_content">
                                    <h4>NRE (New Economic Regulations)</h4>
                                    <p class="mb-2 pb-75">The Nouvelles Regulations Economiques (NRE), passed by the French Parliament, constitutes a broad-ranging update of French corporate law. The majority of its articles addresses items such as improving corporate governance, increasing transparency in competition, and strengthening antitrust regulation. It also requires disclosures on social and environmental issues in the annual reports of firms listed on the French stock exchange. It imposed the first legal requirement, of any nation, for firms to develop and publicly report on financial, social, and environmental impacts. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="o" aria-labelledby="o-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Occupational Disease</h4>
                                    <p class="mb-2 pb-75">Occupational disease refers to any disease arising from the work situation or activity (e.g. regular exposure to harmful chemicals, stress) or from a work-related injury. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Occupational Disease</h4>
                                    <p class="mb-2 pb-75">Occupational disease refers to any disease arising from the work situation or activity (e.g. regular exposure to harmful chemicals, stress) or from a work-related injury. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Occupational Injury</h4>
                                    <p class="mb-2 pb-75">Occupational injury refers to any non-fatal or fatal injury arising out of or in the course of work. </p>
                                </div>
                                <div class="search_content">
                                    <h4>OECD Due Diligence Guidance for Responsible Supply Chains of Minerals from Conflict-Affected and High-Risk Areas</h4>
                                    <p class="mb-2 pb-75">The OECD Due Diligence Guidance for Responsible Supply Chains of Minerals from Conflict-Affected and High-Risk Areas is a collaborative government-backed multi-stakeholder initiative on responsible supply chain management of minerals from conflict-affected areas. The Guidance provides management recommendations for global responsible supply chains of minerals to help companies to respect human rights and avoid contributing to conflict through their mineral or metal purchasing decisions and practices. [Source: OECD] </p>
                                </div>
                                <div class="search_content">
                                    <h4>OECD Guidelines for Multinational Enterprises</h4>
                                    <p class="mb-2 pb-75">The OECD Guide‌lines for Multinational Enterprises are the most comprehensive set of government-backed recommendations on responsible business conduct in existence today. Governments adhering to these guidelines aim to encourage and maximise the positive impact MNEs can make on sustainable development and enduring social progress. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Oeko-Tex Standard 100</h4>
                                    <p class="mb-2 pb-75">The OEKO-TEX® Standard 100 is an independent testing and certification system for textile raw materials, and intermediate and end products at all stages of production. Examples for items eligible for certification: Raw and dyed/finished yarns, raw and dyed/finished fabrics and knits, ready-made articles (all types of clothing, domestic and household textiles, bed linen, terry cloth items, textile toys and more). [Source: Oeko-Tex] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Oeko-Tex Standard 100plus</h4>
                                    <p class="mb-2 pb-75">The OEKO-TEX® Standard 100plus is a product label which enables textile and clothing manufacturers to provide evidence to their end users that their products have been optimised for human ecology and that the production conditions are environmentally friendly. Products with this label are tested for harmful substances according to OEKO-TEX® Standard 100 and are produced exclusively at environmentally friendly production sites. [Source: Oeko-Tex] </p>
                                </div>
                                <div class="search_content">
                                    <h4>OHSAS 18001</h4>
                                    <p class="mb-2 pb-75">OHSAS 18001 is an international standard for occupational health and safety management systems. Organisations that implement OHSAS 18001 have a clear management structure with defined authority and responsibility, clear objectives for improvement, with measurable results and a structured approach to risk assessment. This includes the monitoring of health and safety management failures, auditing of performance and review of policies and objectives. [Source: OHSAS] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Organic Agriculture</h4>
                                    <p class="mb-2 pb-75">According to the Food and Agriculture Organization of the United Nations (FAO), organic agriculture is based on four principles: health, ecology, fairness and care. Those principles apply to agriculture in the broadest sense, including the way people tend to soils, water, plants and animals in order to produce, prepare and distribute goods. They concern the way people interact with living landscapes, relate to one another and shape the legacy of future generations. Organic agriculture can be certified by national or international standards. [Source: FAO] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Ozone-Depleting Substance (ODS)</h4>
                                    <p class="mb-2 pb-75">An ozone-depleting substance (ODS) refers to any substance that can deplete the stratospheric ozone layer. Most ozone-depleting substances are controlled under the Montreal Protocol and its amendments, and include CFCs, HCFCs, halons and methyl bromide. [Source: GRI] </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="p" aria-labelledby="p-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Pan-European Forest Certification (PEFC)</h4>
                                    <p class="mb-2 pb-75">The Pan-European Forest Certification or Programme for the Endorsement of Forest Certification (PEFC) scheme promotes sustainably managed forests through independent third-party certification. The PEFC Council is an independent, non-profit, non-governmental organization founded in 1999. [Source: PEFC] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Parent Company</h4>
                                    <p class="mb-2 pb-75">A parent company is a company that owns enough voting stock in another firm to control management and operations by influencing or electing its board of directors. There is not necessarily an operational link between the two companies. </p>
                                </div>
                                <div class="search_content">
                                    <h4>PAS 2060</h4>
                                    <p class="mb-2 pb-75">PAS 2060 Standard for Carbon Neutrality was created in October 2009 by BSI with the objective of increasing transparency of carbon neutrality claims by providing a common definition and recognized method of achieving carbon neutral status. The specification defines a consistent set of measures and requirements which apply to organizations of all types, including buildings, transport, manufacturing, product lines, and events. [Source: BSI] </p>
                                </div>
                                <div class="search_content">
                                    <h4>PDCA Cycle</h4>
                                    <p class="mb-2 pb-75">The Plan-Do-Check-Action (PDCA) cycle is a system for achieving higher objectives and goals through the cumulative repetition of a procedure comprising of the following four steps: Formulation of policies and plans; Implementation and operation; Evaluation and analysis; and Countermeasures. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Perchloroethylene/Tetrachloroethylene (PCE)</h4>
                                    <p class="mb-2 pb-75">Perchloroethylene (PCE) is a man-made chemical used for dry-cleaning clothes, degreasing metal parts and as an ingredient in the manufacturing of other chemicals. High levels of PCE can cause health hazards when inhaled. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Persistent Organic Pollutants (POPs)</h4>
                                    <p class="mb-2 pb-75">Persistent organic pollutants (POPs) are chemical substances that persist in the environment, bioaccumulate through the food web, and pose a risk of causing adverse effects to human health and the environment. POPs were once heavily used as pesticides. Others are used in industrial processes and in the production of a range of goods such as solvents, polyvinyl chloride, and pharmaceuticals. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Pharmaceutical Supply Chain Initiative (PSCI)</h4>
                                    <p class="mb-2 pb-75">The Pharmaceutical Supply Chain Initiative (PSCI) is an association of large pharmaceutical companies with the aim to support pharmaceutical suppliers to operate in a manner consistent with industry expectations regarding ethics, labor, health and safety, environment and management systems. The principles of this initiative are a voluntary CSR standard for suppliers. [Source: PSCI] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Philanthropy</h4>
                                    <p class="mb-2 pb-75">Philanthropy is the promotion of the welfare of others through the donation of money to good causes. It has to be distinguished from community involvement. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Photovoltaics (PV)</h4>
                                    <p class="mb-2 pb-75">Photovoltaics (PV) is a process whereby solar energy (photons) is directly converted into electricity without mechanical conversion. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Phthalates</h4>
                                    <p class="mb-2 pb-75">Phthalates are a group of chemicals used to soften and increase the flexibility of plastic and vinyl. Polyvinyl chloride is made softer and more flexible by the addition of phthalates. Phthalates are used in hundreds of consumer products. Phthalates are suspected to be endocrine disruptors and reasonably anticipated to be a human carcinogen. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Phytosanitary Products</h4>
                                    <p class="mb-2 pb-75">Products that are labeled as phytosanitary are those that are free or clean of plant pests. Phytosanitary regulations for products differ between countries, but there are certificates usually issued by a plant regulatory official to certify that the products are free from quarantine pests, injurious pests, and they conform to phytosanitary regulations. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Polychlorinated Biphenyl (PCB)</h4>
                                    <p class="mb-2 pb-75">The Polychlorinated Biphenyl (PCB) is a substance that was used as a dielectric oil and coolant for electrical equipment because of it is properties (chemically stable, flame-retardant, non-conductive to electricity etc). It is nevertheless highly toxic and falls under the general term "dioxin." Its manufacture and use have been prohibited in many countries. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Polyvinyl Chloride (PVC)</h4>
                                    <p class="mb-2 pb-75">Polyvinyl Chloride (PVC), is a widely used thermoplastic polymer. Dioxin (the most potent carcinogen known), ethylene dichloride and vinyl chloride are unavoidably created in the production of PVC and can cause severe health problems, in its manufacture, product life and disposal. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Powder Factor</h4>
                                    <p class="mb-2 pb-75">The powder factor is the mass of explosive (kg) used to break each cubic meter of rock. It offers a comparative guide to blasting performance. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Precautionary Principle</h4>
                                    <p class="mb-2 pb-75">The precautionary principle is a moral and political principle which states that if an action or policy might cause severe or irreversible harm to the public or the environment, in the absence of scientific consensus that harm would not ensue, the burden of proof that it is not harmful falls on those taking the action. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Price Fixing</h4>
                                    <p class="mb-2 pb-75">Price fixing is an anti-competitive practice where parties collude to sell or buy a product or service at a fixed price. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Product End-of-Life (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">It is part of EcoVadis criteria and refers to steps taken by companies to mitigate the environmental impacts from the disposal of their products (e.g. recycling, WEEE Directive, RoHS). The criteria covers direct environmental impacts generated from the end-of-life of the products and services. These impacts can include hazardous and non-hazardous waste, emissions and accidental pollution. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Product Stewardship</h4>
                                    <p class="mb-2 pb-75">Product Stewardship (or Extended Producer Responsibility) is an environmental policy approach in which the producer's responsibility for reducing and managing the environmental impact of a product is extended across the whole product life cycle, from selection of materials and design to its disposal. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Product Tying</h4>
                                    <p class="mb-2 pb-75">Product tying occurs when two or more products are sold together in a package and at least one of these products is sold as a mandatory addition to the purchase. It may have a negative impact on price transparency and comparability among providers. [Source: European Commission] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Product Use (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Product Use refers to environmental impacts generated from the direct use of products. It can include energy, water, materials and chemicals use. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Protected Areas</h4>
                                    <p class="mb-2 pb-75">A protected area is "a clearly defined geographical space, recognised, dedicated and managed, through legal or other effective means, to achieve the long term conservation of nature with associated ecosystem services and cultural values". [Source: IUCN] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Public-Private Alliance for Responsible Mineral Trade (PPA)</h4>
                                    <p class="mb-2 pb-75">The Public-Private Alliance for Responsible Minerals Trade is a multi-sector and multi-stakeholder initiative to support supply chain solutions to conflict minerals challenges in the Great Lakes Region of Central Africa. They provide funding and coordination support to organizations working in the region to develop verifiable conflict-free supply chains, align chain-of-custody programs and practices, encourage responsible sourcing from the region, promote transparency, and bolster in-region civil society and governmental capacity. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="r" aria-labelledby="r-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Rainforest Alliance</h4>
                                    <p class="mb-2 pb-75">The Rainforest Alliance works to conserve biodiversity and ensure sustainable livelihoods by transforming land-use practices, business practices and consumer behavior. The approach includes training and certification to promote healthy ecosystems and communities in some of the world’s most vulnerable ecosystems. They have also created the Rainforest Alliance Certified™ seal, recognizing environmental, social and economic sustainability that helps both businesses and consumers do their part to ensure a sustainable future. </p>
                                </div>
                                <div class="search_content">
                                    <h4>REACH</h4>
                                    <p class="mb-2 pb-75">REACH (Registration, Evaluation and Authorisation of Chemicals) is a regulation from the European Union that addresses the production and use of chemical substances and their potential impacts on both human health and the environment. [Source: European Commission] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Renewable Energy</h4>
                                    <p class="mb-2 pb-75">Renewable energies are energies derived from natural processes that are replenished constantly. This includes electricity and heat generated from solar, wind, ocean, hydropower, biomass, geothermal resources, biofuels, and hydrogen derived from renewable resources. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Renewable Energy Certificates (RECs)</h4>
                                    <p class="mb-2 pb-75">Renewable Energy Certificates (RECs) or Green Certificates are a tradable commodity proving that certain electricity is generated using renewable energy sources. RECs provide key informations about the generation of renewable electricity delivered to the utility grid. Buyers can select RECs based on the generation resource (e.g., wind, solar, geothermal). [Source: EPA] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Renewable Resource</h4>
                                    <p class="mb-2 pb-75">Renewable resource is a resource capable of being replenished within a short time through ecological cycles (as opposed to resources such as minerals, metals, oil, gas, coal that do not renew in short time periods). </p>
                                </div>
                                <div class="search_content">
                                    <h4>Repetitive Strain Injury (RSI)</h4>
                                    <p class="mb-2 pb-75">Repetitive strain injury (RSI) is a disorder affecting bones and muscles due to repeating body movements. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Responsible Business Alliance (RBA)</h4>
                                    <p class="mb-2 pb-75">Formerly known as the Electronic Industry Citizenship Coalition (EICC), the Electronic Industry Citizenship Coalition (EICC) promotes an industry code of conduct for global electronics supply chains to improve working and environmental conditions and business ethics with management accountability and responsibility. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Responsible Care</h4>
                                    <p class="mb-2 pb-75">Responsible Care is a chemical industry's global voluntary initiative under which companies, through their national associations, work together to continuously improve their health, safety and environmental performance, and to communicate with stakeholders about their products and processes. [Source: ICCA] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Responsible Care Management System® (RCMS®)</h4>
                                    <p class="mb-2 pb-75">Responsible Care Management System® (RCMS®) provides a formal structure for the Responsible Care Codes of Management Practices. The RCMS® is intended for implementation throughout American Chemistry Council (ACC) member and partner companies’ organization. The RCMS® must be certified through an approved, independent, third-party audit provider and is built on a "Plan-Do-Check-Act” approach. [Source: ACC] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Responsible Care® 14001 (RC14001)</h4>
                                    <p class="mb-2 pb-75">Responsible Care® 14001 (RC14001) is a Technical Specification which combines the elements of the American Chemistry Council’s (ACC) Responsible Care® initiative with ISO 14001. It aims to ensure that the chemical industry makes health, safety, security and the environment top priorities. NSF is an accredited auditor for these initiatives. [Source: NSF] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Responsible Jewellery Council (RJC)</h4>
                                    <p class="mb-2 pb-75">The Responsible Jewellery Council (RJC) is a not-for-profit, standards setting and certification organisation. It has more than 600 Members companies that span the jewellery supply chain from mine to retail. RJC Members commit to and are independently audited against the RJC Code of Practices – an international standard on responsible business practices for diamonds, gold and platinum group metals. The Code of Practices addresses human rights, labour rights, environmental impact, mining practices, product disclosure and many more important topics in the jewellery supply chain. RJC also works with multi-stakeholder initiatives on responsible sourcing and supply chain due diligence. The RJC’s Chain-of-Custody Certification for precious metals supports these initiatives and can be used as a tool to deliver broader Member and stakeholder benefit. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Responsible Marketing (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Responsible marketing is one of the EcoVadis criteria which deals with consumer data protection and privacy as well as truthfulness of marketing messages, and access to essential services. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Responsible Minerals Initiative (RMI)</h4>
                                    <p class="mb-2 pb-75">Formerly known as the Conflict-Free Sourcing Initiative (CFSI), the Conflict-Free Sourcing Initiative (CFSI) was founded in 2008 by members of the Electronic Industry Citizenship Coalition and the Global e-Sustainability Initiative (EICC), and is one of the most utilized and respected resources for companies from a range of industries addressing conflict minerals issues in their supply chains. The Conflict-Free Smelter Program offers companies and their suppliers an independent, third-party audit that determines which smelters and refiners can be validated as “conflict-free,” in line with current global standards. Also offered is a Conflict Minerals Reporting Template, which helps companies disclose and communicate about smelters in their supply chains, and produce white papers and guidance documents on responsible conflict minerals sourcing and reporting on a regular basis. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Responsible Rodenticide Use (CRRU)</h4>
                                    <p class="mb-2 pb-75">The rodenticide industry recognizes the need to ensure that rodenticides are used correctly and in ways that minimise the exposure of wildlife and other non-target animals. CRRU was established to promote responsible use of rodenticides among all user groups, including professional pest controllers, farmers and gamekeepers. CRRU promotes responsible use through a seven point Code of Practice. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Restriction of Hazardous Substances Directive (RoHS)</h4>
                                    <p class="mb-2 pb-75">RoHS is the EU Restriction of Hazardous Substances Directive 2002/95/EC, short for Directive on the restriction of the use of certain hazardous substances in electrical and electronic equipment. It restricts the use of six hazardous materials in the manufacture of various types of electronic and electrical equipments. [Source: European Commission] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Retreading</h4>
                                    <p class="mb-2 pb-75">Usually in the context of fuel efficiency and reduction of vehicle tire waste, retreading is an advanced technique used to deliver excellent fuel efficiency and eco-friendly benefits without purchasing new tires. This process extends the life of tires and lowers overall costs: it is energy and price efficient to create a retread versus a new tire, and can help fleets become more sustainable. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Risk Country</h4>
                                    <p class="mb-2 pb-75">A risk country, as defined in EcoVadis Methodology, is a country which presents potential CSR risks for companies located in this country. Countries are analyzed and qualified according to the following issues: environment, health & social, human rights, corruption, political stability and competitiveness. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Roundtable on Responsible Soy (RTRS)</h4>
                                    <p class="mb-2 pb-75">The Round Table on Responsible Soy Association (RTRS) is a multi-stakeholder initiative which aims to facilitate a global dialogue on sustainable soy production. It was created in Switzerland in 2006. The RTRS approved version 1 of the RTRS Standard in June 2010 with the first certificates introduced in 2011. The RTRS currently has around 150 members worldwide. [Source: RTRS] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Roundtable on Sustainable Palm Oil (RSPO)</h4>
                                    <p class="mb-2 pb-75">The Roundtable on Sustainable Palm Oil (RSPO) is an association formed in 2004 with the objective of promoting the growth and use of sustainable palm oil products through credible global standards and engagement of stakeholders. [Source: RSPO] </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="s" aria-labelledby="s-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>SA8000</h4>
                                    <p class="mb-2 pb-75">SA8000 is a certifiable global social accountability standard for decent working conditions, developed and overseen by Social Accountability International (SAI). It aims at ensuring application of ethical practices in hiring and treatment of employees and in production of goods and services. [Source: SAI] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Safety & Quality Assessment System (SQAS)</h4>
                                    <p class="mb-2 pb-75">Safety & Quality Assessment System (SQAS) is a system to evaluate the quality, safety, security and environmental performance of Logistics Service Providers and Chemical Distributors. The standardized assessment by independent organizations occurs through a questionnaire process. The European Chemical Industry Council (CEFIC) centrally manages the system. [Source: SQAS] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Safety Checklist for Contractors (SCC)</h4>
                                    <p class="mb-2 pb-75">The Safety Checklist for Contractors (SCC) is a standard for the evaluation and certification of safety management systems, certifying that subcontractors' internal processes have been measured against best practices in safety management of hazardous work and found compliant. [Source: SCC] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Scarcity Principle</h4>
                                    <p class="mb-2 pb-75">"Scarcity Principle" is an economic theory which states that limited supply, combined with high demand, equals a lack of pricing equilibrium. Typically, demand and supply will gravitate prices to a stable balance; however, scarcity of a good or service changes the buyers will value the purchase, thus leading to new market conditions. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Server Virtualization</h4>
                                    <p class="mb-2 pb-75">Server virtualization entails running applications in separate, isolated virtual machines (VMs) within a single server. Widely used in enterprise and cloud computing datacenters, each VM runs its own OS and application and can be moved or copied from one server to another for load balancing or to expand processing capability. Advantages include: reducing the number of servers, reducing total cost of ownership, enhance availability and business continuity, and increase efficiency. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Smart Grid</h4>
                                    <p class="mb-2 pb-75">A smart grid is an integrated transmission system for the delivery of electricity from producers to consumers. The system is smart in that it uses digital technologies to optimize efficiency, save energy and costs and to provide increased reliability and transparency. Smart grids are being promoted in many areas to address energy, environmental and reliability issues for electric power. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Smart Meter</h4>
                                    <p class="mb-2 pb-75">A smart meter is a device that is designed to provide information about energy consumption on a real time basis. This information includes data on how much gas and electricity are consumed, how much it is costing and what impact consumption is having on greenhouse gas emissions. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Social Dialogue (EcoVadis citeria)</h4>
                                    <p class="mb-2 pb-75">It is one of the criteria assessed by EcoVadis. It deals with structured social dialogue i.e. social dialogue deployed through recognized employee representatives and collective bargaining. </p>
                                </div>
                                <div class="search_content">
                                    <h4>SOx</h4>
                                    <p class="mb-2 pb-75">SOx refers to the general sulfur oxides (SO, SO2, SO3, etc.). These chemical compounds are generally emitted during fuel combustion and chemical industry operations and contribute to climate change through sulphate aerosol formation, acid rain and other air quality problems. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Specific Absorption Rate (SAR)</h4>
                                    <p class="mb-2 pb-75">The specific absorption rate (SAR) is the measure of the amount of radiofrequency energy absorbed by the body when using a mobile phone. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Stakeholder</h4>
                                    <p class="mb-2 pb-75">A stakeholder represents an individual or group that has an interest in any decision or activity of an organization. [Source: ISO 26000] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Substance of Very High Concern (SVHC)</h4>
                                    <p class="mb-2 pb-75">A Substance of Very High Concern (SVHC) is a chemical substance listed by the European Chemicals Agency (ECHA) as being carcinogenic, mutagenic or having other highly harmful effects. Listing of a substance as an SVHC is the first step in the procedure for restriction of use of a chemical under REACH regulation. [Source: ECHA] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Supplier Environmental Practices (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Supplier Environmental Practices is one of the EcoVadis criteria. It deals with environmental issues within the supply chain i.e. environmental impacts generated from the suppliers and subcontractors own operations and products. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Supplier Ethical Data Exchange (SEDEX)</h4>
                                    <p class="mb-2 pb-75">Supplier Ethical Data Exchange (SEDEX) is a not-for-profit membership organization dedicated to driving improvements in responsible and ethical business practices in global supply chains, and easing the burden on suppliers facing multiple audits, questionnaires, and certifications. It provides its members with a secure online platform for sharing and viewing information on labour standards, health and safety, the environment, and business ethics. [Source: SEDEX] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Supplier Social Practices (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Supplier & Social is one of the EcoVadis criteria. It deals with labor practices and human rights issues within the supply chain i.e. labor practices and human rights issues generated from the suppliers and subcontractors own operations or products. </p>
                                </div>
                                <div class="search_content">
                                    <h4>SusChem</h4>
                                    <p class="mb-2 pb-75">The European Technology Platform for Sustainable Chemistry, also known as SusChem, is a platform that seeks to boost chemistry, biotechnology and chemical engineering research, development and innovation in Europe. It aims, among other things, at achieving more sustainable practices in the EU chemical industry. [Source: SusChem] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Sustainable Apparel Coalition (SAC)</h4>
                                    <p class="mb-2 pb-75">The Sustainable Apparel Coalition is a trade organization comprised of brands, retailers, manufacturers, government and non-governmental organizations, and academic experts, representing more than a third of the global apparel and footwear market. The coalition is working to reduce the environmental and social impacts of apparel and footwear products around the world. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Sustainable Forestry Initiative (SFI)</h4>
                                    <p class="mb-2 pb-75">The Sustainable Forestry Initiative (SFI) certification standard is based on principles that promote sustainable forest management, including measures to protect water quality, biodiversity, wildlife habitat, species at risk, and Forests with Exceptional Conservation Value. [Source: SFI Program] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Sustainable Packaging Coalition (SPC)</h4>
                                    <p class="mb-2 pb-75">The Sustainable Packaging Coalition (SPC) is a project of GreenBlue, a non-profit organization based in the U.S. The SPC is an industry working group focused on green packaging and dedicated to provide a forum for supply chain collaboration, support innovation and provide education, resources and tools. [Source: SPC] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Sustainable Procurement</h4>
                                    <p class="mb-2 pb-75">Sustainable procurement means the consideration of social and environmental factors alongside financial factors in making procurement decisions. It implies looking beyond the traditional economic parameters in making procurement decisions and making decisions based on the whole life cost, the associated risks, measures of success and implications for society and the environment. [Source: UN Procurement Practitioner’s Handbook] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Sustainable Purchasing Leadership Council</h4>
                                    <p class="mb-2 pb-75">The Sustainable Purchasing Leadership Council is a non-profit organization whose mission is to support and recognize purchasing leadership that accelerates the transition to a prosperous and sustainable future. The Council’s programs and community of practice will help institutional purchasers. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="t" aria-labelledby="t-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Tetrachloroethylene (PERC)</h4>
                                    <p class="mb-2 pb-75">Tetrachloroethylene (also known as PERC) is used for dry cleaning and textile processing, as a chemical intermediate, and for vapor degreasing in metal-cleaning operations. Occupational exposure to tetrachloroethylene primarily occurs in industries using (e.g. dry cleaners) and manufacturing the chemical. EPA has classified tetrachloroethylene as likely to be carcinogenic to humans. </p>
                                </div>
                                <div class="search_content">
                                    <h4>The Battery Directive</h4>
                                    <p class="mb-2 pb-75">The 2006/66/EC Directive on batteries, accumulators and waste batteries and accumulators regulates the manufacture and disposal of batteries in the European Union with the indirect aim of improving their environmental performance. It introduces measures to prohibit the marketing of some batteries containing hazardous substances, and promotes collection and recycling. [Source: European Commission] </p>
                                </div>
                                <div class="search_content">
                                    <h4>The Ruggie Framework</h4>
                                    <p class="mb-2 pb-75">The UN "Protect, Respect and Remedy" Framework for Business and Human Rights (‘Ruggie Framework’) is a set of principles for policymakers and executives to protect and respect human rights. The Guiding Principles on Business and Human Rights outline how nation states and businesses should implement the Ruggie Framework. [Source: UN] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Threshold Limit Value (TLV)</h4>
                                    <p class="mb-2 pb-75">The Threshold Limit Value (TLV) is a recommended limit for chemical substance or gas (but also odors or noise exposure). It represents a standard recognized by industry as the maximum amount or concentration of a chemical that a worker can be exposed to. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Time-Weighted Average (TWA)</h4>
                                    <p class="mb-2 pb-75">A time-weighted average is used to calculate a worker's daily exposure to a hazardous substance or agent, taking into account the average levels of the substance or agent and the time spent in the area. This is the guideline OSHA uses to determine permissible exposure limits (PELs) and is essential in assessing a worker's exposure and determining what protective measures should be taken. A time-weighted average is equal to the sum of the portion of each time period multiplied by the levels of the substance or agent during the time period, divided by the hours in the workday. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Together for Sustainability (TfS)</h4>
                                    <p class="mb-2 pb-75">Together for Sustainability is a chemical initiative aimed at enhancing and improving sustainability within the supply chain. The purpose is to develop and implement a global audit program to assess and improve sustainability practices within the supply chains of the chemical industry. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Total Cost of Ownership (TCO)</h4>
                                    <ol>
                                        <li>The Total Cost of Ownership (TCO) is a financial estimate of all direct and indirect costs associated with an asset over its entire life cycle (costs included are for instance maintenance costs, disposal costs or environmental costs).</li>
                                        <li>TCO is a certification scheme that offers ecolabels for IT products.</li>
                                    </ol>
                                </div>
                                <div class="search_content">
                                    <h4>Total Suspended Solids (TSS)</h4>
                                    <p class="mb-2 pb-75">The Total Suspended Solids (TSS) is a water quality measurement of the small particles of solid material (pollutants) suspended or dispersed in wastewater. It is used as an index of water quality/pollution level and of treatment system performance. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Totally Chlorine-Free (TCF)</h4>
                                    <p class="mb-2 pb-75">The TCF ecolabel is achieved through accreditation against a set of standards set in place by the Chlorine Free Products Association (CFPA). It was created to promote sustainable manufacturing practices, implement advanced technologies free of chlorine chemistry, educate consumers on alternatives, and develop world markets for sustainably produced third party certified products and services, all without the use of chlorine. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Toxic Substances Control Act (TSCA)</h4>
                                    <p class="mb-2 pb-75">The Toxic Substances Control Act of 1976 provides the EPA with the authority to require reporting, record-keeping and testing requirements, and restrictions relating to chemical substances and/or mixtures. It addresses the production, importation, use, and disposal of specific chemicals including polychlorinated biphenyls (PCBs), asbestos, radon and lead-based paint. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Toxigenic Substances</h4>
                                    <p class="mb-2 pb-75">A toxigenic substance is a poisonous substance derived from or containing toxins. For example, the mycotoxins are toxic chemical products produced by fungi that readily colonize crops. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Tributyltin (TBT)</h4>
                                    <p class="mb-2 pb-75">Tributyltin (TBT) is a toxic compound used as a biocide in antifouling paints (e.g. applied to underwater parts of ships and boats), wood preservation, textiles and industrial water systems. TBT compounds are considered toxic chemicals which have negative effects on human and environment and considered as persistent organic pollutants. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Triple Bottom Line (TBL)</h4>
                                    <p class="mb-2 pb-75">The Triple Bottom Line (TBL) consists of three pillars: Profit, People and Planet. It aims to measure the financial, social and environmental performance of a corporation over a period of time. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="u" aria-labelledby="u-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>UN Millennium Development Goals (MDGs)</h4>
                                    <p class="mb-2 pb-75">The UN Millennium Development Goals (MDGs) were endorsed by global leaders to be achieved at a global level by the year 2015. Comprised of 8 targets and 48 indicators, these seven goals call for fostering a global partnership for provision of universal education, gender empowerment, improved health and disease control, and poverty alleviation in the world. Entities can contribute through including low-income people in their core business operations, bringing low cost innovations to market, and giving back to the community through philanthropic activities. [Source: UN] </p>
                                </div>
                                <div class="search_content">
                                    <h4>United Nations ADR agreement</h4>
                                    <p class="mb-2 pb-75">The European Agreement concerning the International Carriage of Dangerous Goods by Road (ADR) is intended to increase the safety of international transport of dangerous goods by road. It contains the technical requirements for road transport, i.e. the conditions under which dangerous goods, when authorized for transport, may be carried internationally, as well as uniform provisions concerning the construction and operation of vehicles carrying dangerous goods. It also establishes international requirements and procedures for training and safety obligations of participants. The Agreement has been regularly amended and updated since its entry into force, with the latest version applicable starting 1 January 2015. </p>
                                </div>
                                <div class="search_content">
                                    <h4>United Nations Global Compact (UNGC)</h4>
                                    <p class="mb-2 pb-75">The United Nations Global Compact (UNGC) is a voluntary initiative that encourages businesses worldwide to adopt sustainable and socially responsible policies, and to report on them. Global Compact participants commit to respecting 10 principles on human rights, labor rights, environment and anti-corruption. The initiative has a mandatory disclosure framework, which motivates business participants to annually report on their progress against the 10 principles in a report called Communication on Progress (COP). Companies that do not comply with this reporting requirement are delisted from the list of participants after two years. Under the UNGC, companies are connected with UN agencies, labor groups and civil society organizations.</p>
                                </div>
                                <div class="search_content">
                                    <h4>United Nations Principles for Responsible Investment (UN PRI)</h4>
                                    <p class="mb-2 pb-75">The United Nations-supported Principles for Responsible Investment (PRI) Initiative is an international network of investors working together to put the six Principles for Responsible Investment into practice. Its goal is to understand the implications of sustainability for investors and support signatories to incorporate these issues into their investment decision making and ownership practices. In implementing the Principles, signatories contribute to the development of a more sustainable global financial system. </p>
                                </div>
                                <div class="search_content">
                                    <h4>United Nations World Tourism Organization (UNWTO)</h4>
                                    <p class="mb-2 pb-75">The World Tourism Organization (UNWTO) is the United Nations agency responsible for the promotion of responsible, sustainable and universally accessible tourism. As the leading international organization in the field of tourism, UNWTO promotes tourism as a driver of economic growth, inclusive development and environmental sustainability and offers leadership and support to the sector in advancing knowledge and tourism policies worldwide. UNWTO encourages the implementation of the Global Code of Ethics for Tourism, to maximize tourism’s socio-economic contribution while minimizing its possible negative impacts, and is committed to promoting tourism as an instrument in achieving the United Nations Millennium Development Goals (MDGs), geared towards reducing poverty and fostering sustainable development. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Universal Declaration of Human Rights (UDHR)</h4>
                                    <p class="mb-2 pb-75">The Universal Declaration of Human Rights was adopted by the United Nations General Assembly in 1948. It consists of 30 articles which outline human rights guaranteed to all people, including the right to life, the prohibition against slavery, torture and arbitrary arrest, equality before the law, and the freedom of movement, peaceful assembly, and participation in government. [Source: UN] </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="v" aria-labelledby="v-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Very Persistent and Very Bioaccumulative (vPvB)</h4>
                                    <p class="mb-2 pb-75">Very Persistent and Very Bioaccumulative (vPvB) substances are compounds that persist in the environment (half-life between 60-180 days) and accumulate in the food chain in living organisms for a long period of time (bioconcentration factor greater than 5000). They are considered as Substances of Very High Concern (SVHC) according to REACH. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Video Exposure Monitoring (VEM)</h4>
                                    <p class="mb-2 pb-75">Video exposure monitoring (VEM) is a technique that uses direct-reading instruments to test a worker’s exposure while performing a task as it is being recorded on videotape. It consists of logged real-time collection superimposed upon worksite video. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Volatile Organic Compounds (VOCs)</h4>
                                    <p class="mb-2 pb-75">Volatile organic compounds (VOCs) are emitted as gases from certain solids or liquids. VOCs include a variety of chemicals, some of which may have short- and long-term adverse health effects. Concentrations of many VOCs are consistently higher indoors (up to ten times higher) than outdoors. VOCs are emitted by a wide array of products numbering in the thousands like paints or pesticides. [Source: EPA] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Voluntary Principles on Security and Human Rights (VPs)</h4>
                                    <p class="mb-2 pb-75">The Voluntary Principles on Security and Human Rights (Voluntary Principles or VPs) are a tripartite, multi-stakeholder initiative that provides a set of principles to guide extractives companies in maintaining the security of their operations within a framework that ensures respect for fundamental human rights. [Sources: VPs] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Vortex Generators</h4>
                                    <p class="mb-2 pb-75">Vortex Generators are blades placed in a spanwise line near the leading edge of the wing and tail surfaces. They control airflow over the upper surface of the wing by creating vortices that energize the boundary layer. This results in improved performance and control authority at low airspeeds and high angles of attack. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Voyage Efficiency System</h4>
                                    <p class="mb-2 pb-75">Found mostly in the context of transportation efficiency, this tool can be used to make voyages more efficient in terms of waste produced, fuel consumption, and emissions. Physical changes can occur to the vessel, like retrofitting to more efficient engines, or operational measures such as speed optimization or distance planning can result in voyage efficiency. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="w" aria-labelledby="w-tab" role="tabpanel">
                            <div class="alphabets-body">
                                <div class="search_content">
                                    <h4>Waste Electrical and Electronic Equipment Directive (WEEE)</h4>
                                    <p class="mb-2 pb-75">It refers to the EU directive 2002/96/EC on waste electrical and electronic equipment (WEEE) which promotes the collection and recycling of such equipments (setting of collection, recycling and recovery targets) in order to solve the problem of huge amounts of toxic e-waste. [Source: European Commission] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Water (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Water is one of the EcoVadis criteria and it covers water consumption during operations as well as pollutants rejected into water. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Water Integrity Network (WIN)</h4>
                                    <p class="mb-2 pb-75">The Water Integrity Network (WIN), formed in 2006, stimulates anti-corruption activities in the water sector locally, nationally and globally. It promotes solutions-oriented action and coalition-building between the civil society, private and public sectors, media and governments. [Source: WIN] </p>
                                </div>
                                <div class="search_content">
                                    <h4>Water-based Varnishes</h4>
                                    <p class="mb-2 pb-75">Water-based varnishes have certain advantages over those with a chemical solvent; the most important being that they are non-toxic and they dry faster. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Whistleblowing</h4>
                                    <p class="mb-2 pb-75">A whistleblowing procedure is a formal independent complaint system put in place within an organization to enforce governance and ethics standards. With this procedure a whistleblower can raise concern over possible wrongdoings and illegal practices (misconduct) by an organization. Every report and the identity of the whistleblower shall be handled confidentially. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Wolfsberg Group</h4>
                                    <p class="mb-2 pb-75">The Wolfsberg Group is an association of eleven global banks, which aims to develop financial services industry standards, and related products, for Know Your Customer, Anti-Money Laundering and Counter Terrorist Financing policies. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Working Conditions (EcoVadis criteria)</h4>
                                    <p class="mb-2 pb-75">Working Conditions is one of the criteria assessed by EcoVadis which deals with working hours, monitoring of employee satisfaction, participation, remunerations and social benefits granted to employees. </p>
                                </div>
                                <div class="search_content">
                                    <h4>Work-life Balance</h4>
                                    <p class="mb-2 pb-75">Work-life balance refers to working practices that acknowledge and aim to support the needs of staff in achieving a balance between their private and working life. Examples of work life-balance measures include: the possibility to work from home, the possibility to work part-time, flexible-time schedules, childcare facilities at work, in-house services etc. </p>
                                </div>
                                <div class="search_content">
                                    <h4>World Association for Opinion and Marketing Research Professionals (ESOMAR)</h4>
                                    <p class="mb-2 pb-75">ESOMAR facilitates an on-going dialogue with its 4,900 members, in over 130 countries, through the promotion of a comprehensive programme of industry specific and thematic conferences, publications and best practice guidelines. ESOMAR also provides ethical guidance and actively promotes self-regulation in partnership with a number of associations across the globe. Members agree to abide by the ICC/ESOMAR International Code on Market and Social Research, which has been jointly drafted by ESOMAR and the International Chamber of Commerce and is endorsed by the major national and international professional bodies around the world. </p>
                                </div>
                                <div class="search_content">
                                    <h4>World Business Council for Sustainable Development (WBCSD)</h4>
                                    <p class="mb-2 pb-75">The World Business Council for Sustainable Development (WBCSD) is a CEO-led organization of some 200 companies that galvanized the global business community to create a sustainable future for business, society and the environment. [Source: WBCSD] </p>
                                </div>
                                <div class="search_content">
                                    <h4>World Economic Forum Partnering Against Corruption Initiative (WEF PACI)</h4>
                                    <p class="mb-2 pb-75">PACI is one of the strongest cross-industry collaborative efforts at the World Economic Forum. The initiative creates a more visible, dynamic and agenda-setting platform, working with committed business leaders, international organizations and governments to address corruption, transparency and emerging-market risks. Over the past ten years, PACI has become the leading global business voice on anti-corruption and transparency. Comprising nearly 100 active companies. </p>
                                </div>
                                <div class="search_content">
                                    <h4>World Resources Institute (WRI)</h4>
                                    <p class="mb-2 pb-75">The World Resources Institute (WRI) is an independent, non-profit organization founded in 1982 with headquarters in the United States. The WRI work is organized around four key programmatic goals: Climate Protection, Governance, Markets & Enterprise, People & Ecosystems. Their World Resources Report is published every two years, and gathers data for an in-depth analysis on current environmental issues. [Source: WRI] </p>
                                </div>
                                <div class="search_content">
                                    <h4>World Wildlife Fund (WWF)</h4>
                                    <p class="mb-2 pb-75">The world’s leading conservation organization, WWF works in 100 countries and is supported by 1.1 million members in the United States and close to 5 million globally. WWF’s unique way of working combines global reach with a foundation in science, involves action at every level from local to global, and ensures the delivery of innovative solutions that meet the needs of both people and nature. WWF's mission is to conserve nature and reduce the most pressing threats to the diversity of life on Earth. </p>
                                </div>
                                <div class="search_content">
                                    <h4>World Wildlife Fund Global Forest and Trade Network</h4>
                                    <p class="mb-2 pb-75">Worldwide Responsible Accredited Production (WRAP) is a U.S. not-for-profit organization which promotes ethical, social and environmental conditions and practices in manufacturing facilities. WRAP offers a global certification program for the apparel, footwear and sewn products sectors. [Source: WRAP] </p>
                                </div>
                                <div class="search_content">
                                    <h4>WWF Paper scorecard</h4>
                                    <p class="mb-2 pb-75">The WWF Paper scorecard is a tool set up by WWF to guide paper producers as well as commercial and individual paper buyers to reduce the environmental footprint of paper production and paper consumption. [Source: WWF] </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tabs ends -->
        </section>


    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>">
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>">
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#search').keyup(function() {

            // Search text
            var text = $(this).val();

            // Hide all content class element
            $('.search_content').hide();

            // Search and show
            $('.search_content:contains("' + text + '")').show();

        });
    });
</script>
<!-- <script>
    $(document).ready(function() {
        $('#search').keyup(function() {

            // Search text
            var text = $(this).val().toLowerCase();

            // Hide all content class element
            $('.search_content').hide();

            // Search
            $('.search_content p').each(function() {

                if ($(this).text().toLowerCase().indexOf("" + text + "") != -1) {
                    $(this).closest('.search_content').show();
                }
            });
        });
    });
</script> -->

<?= $this->endSection() ?>