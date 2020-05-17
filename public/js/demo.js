/*
 * jQuery File Upload Demo
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global $ */


$(function () {
    'use strict';

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    $('#fileupload').fileupload({
        type: 'post',
        url: '/attachment/store',
        // acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp4|avi)$/i,
        autoUpload: true,
        success: function (response) {
            console.log(response);
        }
    });
    $('#fileupload').bind('fileuploadsubmit', function (e, data) {
        var inputs = data.context.find(':input');
        if (inputs.filter(function () {
                return !this.value && $(this).prop('required');
            }).first().focus().length) {
            data.context.find('button').prop('disabled', false);
            return false;
        }
        data.formData = inputs.serializeArray();;
    });

    $("button.delete").on("click", function (e) {
        e.preventDefault();
        var link = $(this);

        var req = $.ajax({
            dataType: 'json',
            url: link.data('url'),
            type: 'DELETE',
            success: function () {
                link.parents('.template-download').remove();
            }
        });
    });

    $("body").on("click","a.fullscreen",function (e) {
        e.preventDefault();
        var link = $(this);
        $("body").append(
            $("<div id='blueimp-gallery'></div>")
                .append($("<img>").attr("src",link.attr("href")))
                .append($("<span>&times;</span>").addClass("close"))
        );
    });

    $("body").on("click","#blueimp-gallery:not(img)",function (e) {
        console.log(e.target)
        e.preventDefault();
        $(this).closest("#blueimp-gallery").remove();
    });

    $("body").on("click", "button.update", function (e) {
        e.preventDefault();
        var link = $(this);
        var isEditting = link.find("input[type='hidden']").val();
        var scope = link.parents(".template-download").find(".file-desc");
        if (isEditting == 0) {
            var current_title = scope.find("a").text();
            scope.find(".name").html(
                "<div class='w-100'><label>عنوان :</label>\n" +
                "<input type=\"text\" name=\"file_title[]\" class=\"form-control form-control-sm py-0\" value=\"" + current_title +"\" required></div>\n");
            link.find("input[type='hidden']").val(1);
        } else {
            var file_title = link.parents(".template-download").find("input[type='text']").val();
            var linkAddr = link.parents(".template-download").find(".preview a.fullscreen").attr("href");
            $.ajax({
                method: link.attr("data-type"),
                url: link.attr("data-url"),
                data: {
                    title: file_title
                },
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        scope.find(".name").html("<a class=\"fullscreen\" href=\""+linkAddr+"\" title=" + response.title + " download=" + response.title + " data-gallery>" + response.title + "</a>")
                    }
                    link.find("input[type='hidden']").val(0);
                }
            })
        }
    });
});
