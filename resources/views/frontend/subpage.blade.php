@extends('frontend.layouts.main')
@section('content')

<div class="row">
    <div class="col-md-12">



        <!-- Category Info -->
        <div class="category-info " id="browser-support">
            <h3 class="category-title"> Browser support
                <!-- Fragment Identifier -->
                <a class="fragment-identifier js-fragment-identifier fragment-identifier-scroll" href="#browser-support">
                    <i class="fa fa-link"></i>
                </a>
                <!-- End of Fragment Identifier -->
            </h3>
            <h4 class="category-description">Specifically, we support the latest versions of the following browsers and platforms. On Windows, we support Internet Explorer 9+. More specific support information is provided below.</h4>
        </div>
        <!-- End of Caregory Info -->
        <!-- Browser Support -->
        <ul class="browsers ">
            <li class="browser-recommended">
                <div class="browser-icon">
                    <svg enable-background="new 0 0 515.91 728.5" height="64" id="Layer_2" viewBox="0 0 512.00003 512" width="64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
											<defs id="defs7" />
                        <g id="g6625" transform="translate(-141.91412,-143.63566)">
                            <path d="m 397.91414,530.64366 c -26.00001,0 -49.66401,-7.008 -71.00801,-20.992 -21.344,-14 -37.344,-32 -48,-54 L 173.91412,271.63565 c -22,39.344 -32,83.344 -32,128.00001 0,64 20.832,119.84 62.496,167.50401 41.66401,47.664 93.50401,76.16 155.50401,85.504 l 74.25601,-128.49601 c -7.472,2.192 -19.936,6.496 -36.256,6.496 z"
                                  id="path5-5" style="fill:#4aae48" />
                            <path d="m 317.41813,296.13165 c 23.648,-18.32 50.496,-24.496 80.49601,-24.496 4,0 220.00001,0 220.00001,0 -22.672,-38.656 -53.504,-71.32801 -92.49601,-94.00001 -39.008,-22.656 -81.504,-34 -127.504,-34 -40.00001,0 -77.34401,8.496 -112.00001,25.504 -34.672,16.992 -66.75201,41.744 -90.25601,73.50401 l 74.25601,124.992 c 7.328,-28.656 23.824,-53.152 47.504,-71.504 z"
                                  id="path7-1" style="fill:#ea3939" />
                            <path d="M 634.66615,303.63565 H 485.91414 c 26,26 43.008,59.344 43.008,96.00001 0,27.344 -7.664,52.336 -23.008,75.008 l -104.992,180.99201 c 70,-0.672 129.664,-26 179.00801,-76 49.312,-50.00001 73.984,-110.00001 73.984,-180.00001 0,-32.65601 -5.504,-67.00801 -19.248,-96.00001 z"
                                  id="path9-7" style="fill:#fed14b" />
                            <circle cx="16" cy="16" id="circle11" r="6" style="fill:#188fd1" transform="matrix(16.000001,0,0,16.000001,141.91412,143.63564)" />
                        </g>
										</svg>
                </div>
                <h4 class="browser-title"> Chrome </h4>
            </li>
            <li>
                <div class="browser-icon">
                    <svg enable-background="new 0.907 -0.205 32 32" height="64" viewBox="0.907 -0.205 32 32" width="64" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M16.907-.205c-8.836 0-16 7.164-16 16s7.164 16 16 16 16-7.164 16-16-7.164-16-16-16zm0 29c-7.18 0-13-5.82-13-13s5.82-13 13-13 13 5.82 13 13-5.82 13-13 13z" fill="#26A6D1" fill-rule="evenodd" />
                        <path clip-rule="evenodd" d="M25.221 7.48l-6.192 10.436-4.242-4.243 10.434-6.193z" fill="#E2574C" fill-rule="evenodd" />
                        <path clip-rule="evenodd" d="M8.594 24.11l10.435-6.193-4.242-4.243-6.193 10.436z" fill="#E4E7E7" fill-rule="evenodd" />
                    </svg>
                </div>
                <h4 class="browser-title"> Safari </h4>
            </li>
            <li>
                <div class="browser-icon">
                    <svg enable-background="new 0 0 32 32" height="64" id="Layer_1" viewBox="0 0 32 32" width="64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
											<g>
                                                <path d="M26.737,4.375c2.842,2.917,4.264,6.75,4.264,11.5c0,4.334-1.422,8.104-4.264,11.312   C23.895,30.396,20.295,32,15.938,32c-4.316,0-7.885-1.604-10.706-4.812C2.41,23.979,1,20.209,1,15.875   c0-4.75,1.39-8.583,4.171-11.5C7.95,1.459,11.54,0,15.938,0C20.295,0,23.895,1.459,26.737,4.375z M21.291,11.062   c-0.124-1.291-0.373-2.552-0.747-3.781c-0.373-1.229-0.944-2.177-1.711-2.844c-0.769-0.666-1.733-1-2.895-1   c-1.162,0-2.116,0.323-2.863,0.969C12.328,5.053,11.778,6,11.426,7.25S10.835,9.75,10.71,11c-0.124,1.25-0.187,2.771-0.187,4.562   c0,1.125,0.021,2.073,0.062,2.844c0.04,0.771,0.113,1.709,0.218,2.812c0.103,1.104,0.27,2.031,0.498,2.781   c0.228,0.75,0.538,1.49,0.934,2.219c0.394,0.729,0.902,1.281,1.524,1.656s1.348,0.562,2.179,0.562c0.829,0,1.565-0.188,2.21-0.562   c0.643-0.375,1.161-0.927,1.556-1.656C20.098,25.49,20.42,24.75,20.669,24s0.436-1.677,0.56-2.781   c0.125-1.104,0.197-2.052,0.219-2.844c0.02-0.791,0.03-1.729,0.03-2.812C21.478,13.854,21.416,12.354,21.291,11.062z"
                                                      fill="#EA3939" />
                                            </g>
                        <g/>
                        <g/>
                        <g/>
                        <g/>
                        <g/>
                        <g/>
										</svg>
                </div>
                <h4 class="browser-title"> Opera </h4>
            </li>
            <li>
                <div class="browser-icon">
                    <svg enable-background="new -0.002 -0.501 32 31" height="64" viewBox="-0.002 -0.501 32 31" width="64" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.998-.501c8.284 0 15 6.715 15 15 0 8.283-6.716 15-15 15s-15-6.717-15-15c0-8.286 6.716-15 15-15z" fill="#2394BC" />
                        <path d="M18.562 30.274c7.614-1.229 13.437-7.814 13.437-15.775l-.146.181c.228-1.513.188-2.861-.125-4.037-.112.871-.234 1.397-.357 1.608-.001-.068-.018-.976-.307-2.243-.137-.924-.338-1.793-.616-2.596.068.368.108.675.128.953-1.162-3.118-4.023-6.957-11.072-6.867 0 0 2.479.262 3.646 2.029 0 0-1.193-.285-2.095.152 1.099.438 2.052.896 2.863 1.374l.07.043c.208.125.385.253.573.38 1.498 1.052 2.888 2.553 2.782 4.489-.323-.51-.753-.844-1.304-1.012.679 2.66.746 4.857.197 6.59-.377-1.154-.724-1.846-1.033-2.09.431 3.566-.15 6.203-1.739 7.922.302-1.049.422-1.908.354-2.586-1.867 2.822-3.991 4.281-6.372 4.371-.941-.008-1.83-.15-2.666-.426-1.228-.415-2.339-1.124-3.328-2.13 1.544.129 2.954-.139 4.195-.772l2.033-1.332-.008-.006c.264-.1.512-.092.754.021.496-.068.67-.334.504-.783-.24-.334-.603-.637-1.069-.904-1.017-.531-2.079-.447-3.187.26-1.055.6-2.07.576-3.058-.062-.647-.447-1.272-1.049-1.876-1.801l-.24-.355c-.113.852.015 1.945.398 3.291l.008.018-.008-.016c-.384-1.346-.511-2.442-.398-3.293v-.008c.029-.744.337-1.154.924-1.246l-.249-.021.251.021c.663.061 1.424.213 2.282.463.144-.828-.045-1.695-.564-2.584v-.016c.806-.752 1.521-1.299 2.132-1.648.271-.145.429-.365.481-.662l.022-.016.008-.008.03-.029c.158-.236.105-.426-.165-.594-.565.031-1.131-.008-1.695-.121l-.008.023c-.233-.068-.527-.275-.889-.625l-.927-.912-.278-.219v.029h-.008l.008-.037-.053-.055.075-.053c.128-.691.339-1.285.64-1.795l.068-.061c.302-.502.881-1.041 1.732-1.617-1.582.197-3.013.91-4.285 2.143-1.055-.387-2.305-.305-3.744.25l-.173.132-.013.007.188-.138.008-.008c-.905-.416-1.515-1.611-1.809-3.564-1.152 1.141-1.71 3.178-1.673 6.119l-.33.499-.085.058-.017.016-.007.007-.016.033c-.175.274-.416.688-.72 1.244-.437.786-.584 1.446-.627 2.021l-.004.007.002.019-.014.151.025-.04c.003.133.006.267.04.387l.934-.768c-.339.859-.564 1.77-.678 2.736l-.027.442-.293-.335c0 3.428 1.088 6.597 2.924 9.201l.055.086.088.105c1.32 1.813 3.006 3.338 4.958 4.464 1.403.831 2.911 1.413 4.519 1.759l.331.074c.333.064.674.112 1.016.155.253.033.506.065.762.087l.34.039.483.003.525.026.418-.021.689-.034c.409-.028.812-.073 1.212-.131l.243-.036zm-9.409-16.75h0zm19.527-2.741l-.007.131.005-.132.002.001z"
                              fill="#EC8840" />
                    </svg>
                </div>
                <h4 class="browser-title"> FireFox </h4>
            </li>
            <li class="browser-partial">
                <div class="browser-icon">
                    <svg enable-background="new 0.001 -0.001 31.996 29.997" height="64" viewBox="0.001 -0.001 31.996 29.997" width="64" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.841 17.972h8.032c.074-.576.147-1.162.116-1.758-.321-6.163-4.144-11.568-9.642-13.413l.423.084s10.027-4.359 6.644 5.447l.412.677s3.089-7.542-1.688-8.789c-3.909-1.02-9.686 1.814-9.686 1.814l.213.042c-.359-.025-.721-.042-1.088-.042-7.146 0-13.078 4.845-14.215 11.453.81-.907 3.712-4.255 6.979-6.352 0 0-5.566 4.76-7.177 8.671 0 0-2.064 3.502-2.742 6.122-.41 1.588-1.463 7.283 2.742 7.938 4.376.68 7.829-1.551 7.829-1.551l-.084-.047c1.994 1.018 4.261 1.598 6.667 1.598 6.375 0 11.779-4.26 13.68-9.855h-8.242c-1.123 2.213-3.112 3.449-5.467 3.449-3.123 0-5.413-1.84-6.008-5.488h12.302zm-13.819 9.807s-2.421 1.18-4.463 1.236c-6.243-.057-1.565-8.506-1.565-8.506l-.003-.009c1.107 3.051 3.264 5.619 6.048 7.291l-.017-.012zm7.556-19.226c3.617 0 5.309 2.446 5.718 5.45h-11.697c.635-2.98 2.702-5.45 5.979-5.45z"
                              fill="#26A6D1" />
                    </svg>
                </div>
                <h4 class="browser-title"> IE 9+ </h4>
            </li>
        </ul>
        <!-- End of Browser Support -->
        <!-- Category Info -->
        <div class="category-info " id="faq">
            <h3 class="category-title"> FAQ
                <!-- Fragment Identifier -->
                <a class="fragment-identifier js-fragment-identifier fragment-identifier-scroll" href="#faq">
                    <i class="fa fa-link"></i>
                </a>
                <!-- End of Fragment Identifier -->
            </h3>
            <h4 class="category-description">Begin typing your question. If we don't have an answer for it in our FAQ, please leave us a message on our contact page.</h4>
        </div>
        <!-- End of Caregory Info -->
        <!-- Faq -->
        <div class="faq-filter js-faq-filter" data-target="#my-faq">
            <input type="text" placeholder="How to ..."> </div>
        <ul class="faq js-faq" id="my-faq">
            <li class="faq-item">
                <h4 class="faq-question"> What is
                    <span class="faq-keyword">WordPress</span>? </h4>
                <div class="faq-answer"> WordPress is open source web software that you can install on your web server to create your website, blog, community or network. WordPress started out as a tool for blogging, but has evolved into a full-fledged Content Management System (CMS),
                    capable of powering websites, networks and communities. </div>
            </li>
            <li class="faq-item">
                <h4 class="faq-question"> Why
                    <span class="faq-keyword">choose</span> WordPress? </h4>
                <div class="faq-answer"> One of the principal advantages of WordPress is that you are in control. Unlike remote-hosted scripts such as Blogger and LiveJournal, you host WordPress on your own server. Installation is very simple, as is the configuration. Unlike other software
                    programs, there are not a million files to chmod nor are there dozens of templates to edit just to get your site set up and looking the way you want. </div>
            </li>
            <li class="faq-item">
                <h4 class="faq-question"> What are WordPress'
                    <span class="faq-keyword">features</span>? </h4>
                <div class="faq-answer"> WordPress has an extensive list of features and, as it is constantly evolving, this list of features is constantly growing. </div>
            </li>
            <li class="faq-item">
                <h4 class="faq-question"> When was WordPress
                    <span class="faq-keyword">first</span> released? </h4>
                <div class="faq-answer"> WordPress started out life as a fork of b2/cafelog by Matt Mullenweg and Mike Little. The first version was released in 2003 </div>
            </li>
            <li class="faq-item">
                <h4 class="faq-question"> What is the
                    <span class="faq-keyword">GPL</span>? </h4>
                <div class="faq-answer"> The GPL is an open source license. This means you are free to modify and redistribute the source code under certain conditions. You can read more about why we chose the GPL on the License Page. </div>
            </li>
            <li class="faq-item">
                <h4 class="faq-question"> What’s the
                    <span class="faq-keyword">difference</span> between WordPress.org and WordPress.com? </h4>
                <div class="faq-answer"> WordPress.com is a blog network run by Automattic. It uses WordPress software, but individual blogs are hosted and managed by WordPress.com. This is a free service with premium addons and upgrades. </div>
            </li>
            <li class="faq-item">
                <h4 class="faq-question"> How Is WordPress related to other
                    <span class="faq-keyword">blogging</span> applications? </h4>
                <div class="faq-answer"> WordPress was primarily inspired by Noah Grey's Greymatter open-source web log and journal software. It is related to b2, sort of a second cousin twice removed. You can use WordPress to post your own stories, ideas, rants, reviews, links, and
                    pictures of your toothless Uncle Ernie at the wedding reception, if you choose. In addition, you can customize the look and feel of your site. Numerous themes are available and may be modified in many different ways. Through the use of WordPress
                    Themes, you can quickly change the look and style of your site. You can also extend WordPress' functionality through the use of Plugins. Plugins let you create the website or blog that suits your needs. As you can see, its functionality exceeds
                    or at least is similar to what is available in most blogging tools today. </div>
            </li>
            <li class="faq-item">
                <h4 class="faq-question"> Do I need to know
                    <span class="faq-keyword">PHP</span> to use WordPress? </h4>
                <div class="faq-answer"> No. You should be able to use WordPress through the user interface, without ever having to touch PHP. The only time you would modify your WordPress website with PHP would be when integrating some of the plugins. There are a small number of plugins
                    that still require manual edits to your files. In most cases, clear instructions are usually given within a text file with the plugin. </div>
            </li>
        </ul>
        <!-- End of Faq -->
        <!-- Category Info -->
        <div class="category-info " id="donate">
            <h3 class="category-title"> Give us a little love
                <!-- Fragment Identifier -->
                <a class="fragment-identifier js-fragment-identifier fragment-identifier-scroll" href="#donate"><i class="fa fa-link"></i></a>
                <!-- End of Fragment Identifier -->
            </h3>
            <h4 class="category-description">Illo, rem temporibus natus consectetur, vero cupiditate voluptate unde quam, ipsum, ea incidunt veritatis aspernatur est sint ipsa quibusdam? Ea ratione accusamus voluptatibus, ut quasi voluptates possimus alias, nostrum.</h4>
        </div>
        <!-- End of Caregory Info -->
        <!-- Donate -->
        <ul class="donate-money-list">
            <li class="donate-money">
                <a href="#"><span class="donate-summ">5<span class="currency">$</span></span><span class="donate-button">Donate</span></a>
            </li>
            <li class="donate-money">
                <a href="#"><span class="donate-summ">10<span class="currency">$</span></span><span class="donate-button">Donate</span></a>
            </li>
            <li class="donate-money">
                <a href="#"><span class="donate-summ">20<span class="currency">$</span></span><span class="donate-button">Donate</span></a>
            </li>
            <li class="donate-money">
                <a href="#"><span class="donate-summ">50<span class="currency">$</span></span><span class="donate-button">Donate</span></a>
            </li>
            <li class="donate-money">
                <a href="#"><span class="donate-summ">50<span class="custom-plus">+</span></span><span class="donate-button">Custom</span></a>
            </li>
        </ul>
        <!-- End of Donate -->
    </div>
</div>
@stop