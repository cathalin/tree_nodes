/*
 * Copyright (c) 2013 Patric Gutersohn
 * http://www.ladensia.com
 *
 * Licensed under the MIT License
 */

/* ///////////////////////////////////////////////////////////////////////////////////////////////////
 * Here you can set the details of your packages
 */
//webspace in MB, nr of ftp, nr of mysql, nr of email, nr of subdomain, nr of addon, bandwith in mb
var sPackage    =    [500, 5, 5, 5, 5, 5, 5];
var mPackage    =    [600, 6, 6, 6, 6, 6, 6];
var lPackage    =    [700, 7, 7, 7, 7, 7, 7];
var xlPackage   =    [800, 8, 8, 8, 8, 8, 8];
var xxlPackage  =    [900, 9, 9, 9, 9, 9, 9];
//////////////////////////end of package details//////////////////////////////////////////////////////


/*
 *
 *   Do not edit the bellow lines
 *
 */
var packages = [sPackage, mPackage, lPackage, xlPackage, xxlPackage];


$(document).ready(function () {

    appendList(2);

    var slider = $('.slider-pkg').slider({
        max: 5,
        min: 1,
        value: 3,
        orientation: 'vertical',
        range: "min",
        slide: function (e, ui) {

            if (ui.value >= 0) {
                $('.pkg-details li').remove();
                appendList(ui.value - 1);
            }
        }
    }).slider('pips',
        { rest: 'label',
            labels: ['XXL', 'XL', 'L', 'M', 'S'] });


    $('.submit').click(function () {

        showLoading();

        var xmlRequest = $.ajax({
            type: "POST",
            url: $(location).attr('href') + "\success.php", //here you can set your domain
            data: {
                username: $('.username').val(),
                domain: $('.domain').val(),
                password: $('.password').val(),
                contactemail: $('.cemail').val(),
                webspace: $('.pkg-details .webspace').text(),
                ftp: $('.pkg-details .ftp').text(),
                mysql: $('.pkg-details .mysql').text(),
                email: $('.pkg-details .email').text(),
                subdomain: $('.pkg-details .subdomain').text(),
                addon: $('.pkg-details .addon').text(),
                bandwith: $('.pkg-details .bandwith').text()
            }
        }).success(function (response) {
                $('#msg').attr('style', 'background: none');
                $('#msg').text(response);
                $("html, body").animate({ scrollTop: 0 }, 600);
            });
    });


});

function showLoading() {
    $('#msg').attr('style', 'display: block');
    $("html, body").animate({ scrollTop: 0 }, 600);
}

function appendList(i) {

    $('.pkg-details').append(
        '<li><span class="webspace">' + packages[i][0] + ' </span>MB Webspace</li>' +
            '<li><span class="ftp">' + packages[i][1] + ' </span>FTP Accounts</li>' +
            '<li><span class="mysql">' + packages[i][2] + ' </span>MySQL Accounts</li>' +
            '<li><span class="email">' + packages[i][3] + ' </span>E-Mail Accounts</li>' +
            '<li><span class="subdomain">' + packages[i][4] + ' </span>Subdomains Accounts</li>' +
            '<li><span class="addon">' + packages[i][5] + ' </span>Addon Domains Accounts</li>' +
            '<li><span class="bandwith">' + packages[i][6] + ' </span>MB Bandwidth</li>'
    );

}