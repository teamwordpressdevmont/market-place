@extends('layouts.app')
@section('content')
<div class="mt-5">
    <div class="bgShadow pt-10 pb-8">
       <div class="grid grid-cols-1 mb-6 items-start">
          <div>
             <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Subscription plans</h1>
          </div>
       </div>
    </div>
    <form id="blogForm" action="" method="POST" enctype="multipart/form-data">
        <div class="site_field_col mt-0! mb-7!">
            <label for="title" class="block text-sm font-bold text-mat">Title</label>
            <div class="mt-4">
                <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input type="text" name="title" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Brian" value="">
                </div>
            </div>
        </div>
        <div class="site_field_col mt-0! mb-7!">
            <label for="description" class="block text-sm font-bold text-mat">Description</label>
            <div class="mt-4 bg-white rounded-2xl">
                <div class="trumbowyg-box trumbowyg-editor-visible trumbowyg-en trumbowyg"><div class="trumbowyg-button-pane"><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-viewHTML-button trumbowyg-not-disable" title="View HTML" tabindex="-1"><svg><use xlink:href="#trumbowyg-view-html"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-undo-button " title="Undo (Ctrl + Z)" tabindex="-1"><svg><use xlink:href="#trumbowyg-undo"></use></svg></button><button type="button" class="trumbowyg-redo-button " title="Redo (Ctrl + Y)" tabindex="-1"><svg><use xlink:href="#trumbowyg-redo"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-formatting-button trumbowyg-open-dropdown" title="Formatting" tabindex="-1"><svg><use xlink:href="#trumbowyg-p"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-strong-button " title="Strong (Ctrl + B)" tabindex="-1"><svg><use xlink:href="#trumbowyg-strong"></use></svg></button><button type="button" class="trumbowyg-em-button " title="Emphasis (Ctrl + I)" tabindex="-1"><svg><use xlink:href="#trumbowyg-em"></use></svg></button><button type="button" class="trumbowyg-del-button " title="Deleted" tabindex="-1"><svg><use xlink:href="#trumbowyg-del"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-superscript-button " title="Superscript" tabindex="-1"><svg><use xlink:href="#trumbowyg-superscript"></use></svg></button><button type="button" class="trumbowyg-subscript-button " title="Subscript" tabindex="-1"><svg><use xlink:href="#trumbowyg-subscript"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-link-button trumbowyg-open-dropdown" title="Link" tabindex="-1"><svg><use xlink:href="#trumbowyg-link"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-insertImage-button " title="Insert Image" tabindex="-1"><svg><use xlink:href="#trumbowyg-insert-image"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-justifyLeft-button " title="Align Left" tabindex="-1"><svg><use xlink:href="#trumbowyg-justify-left"></use></svg></button><button type="button" class="trumbowyg-justifyCenter-button " title="Align Center" tabindex="-1"><svg><use xlink:href="#trumbowyg-justify-center"></use></svg></button><button type="button" class="trumbowyg-justifyRight-button " title="Align Right" tabindex="-1"><svg><use xlink:href="#trumbowyg-justify-right"></use></svg></button><button type="button" class="trumbowyg-justifyFull-button " title="Align Justify" tabindex="-1"><svg><use xlink:href="#trumbowyg-justify-full"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-unorderedList-button " title="Unordered list" tabindex="-1"><svg><use xlink:href="#trumbowyg-unordered-list"></use></svg></button><button type="button" class="trumbowyg-orderedList-button " title="Ordered list" tabindex="-1"><svg><use xlink:href="#trumbowyg-ordered-list"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-horizontalRule-button " title="Insert horizontal rule" tabindex="-1"><svg><use xlink:href="#trumbowyg-horizontal-rule"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-removeformat-button " title="Remove format" tabindex="-1"><svg><use xlink:href="#trumbowyg-removeformat"></use></svg></button></div><div class="trumbowyg-button-group trumbowyg-right"><button type="button" class="trumbowyg-fullscreen-button trumbowyg-not-disable" title="Fullscreen" tabindex="-1"><svg><use xlink:href="#trumbowyg-fullscreen"></use></svg></button></div></div><div class="trumbowyg-editor-box"><div class="trumbowyg-editor" contenteditable="true" dir="ltr"><br></div></div><textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 sm:text-sm/6 trumbowyg-textarea" tabindex="-1" style="height: 297px;">
                </textarea><div class="trumbowyg-dropdown-formatting trumbowyg-dropdown trumbowyg-fixed-top " data-trumbowyg-dropdown="formatting" style="display: none;"><button type="button" class="trumbowyg-p-dropdown-button "><svg><use xlink:href="#trumbowyg-p"></use></svg>Paragraph</button><button type="button" class="trumbowyg-blockquote-dropdown-button "><svg><use xlink:href="#trumbowyg-blockquote"></use></svg>Quote</button><button type="button" class="trumbowyg-h1-dropdown-button "><svg><use xlink:href="#trumbowyg-h1"></use></svg>Header 1</button><button type="button" class="trumbowyg-h2-dropdown-button "><svg><use xlink:href="#trumbowyg-h2"></use></svg>Header 2</button><button type="button" class="trumbowyg-h3-dropdown-button "><svg><use xlink:href="#trumbowyg-h3"></use></svg>Header 3</button><button type="button" class="trumbowyg-h4-dropdown-button "><svg><use xlink:href="#trumbowyg-h4"></use></svg>Header 4</button></div><div class="trumbowyg-dropdown-link trumbowyg-dropdown trumbowyg-fixed-top " data-trumbowyg-dropdown="link" style="display: none;"><button type="button" class="trumbowyg-createLink-dropdown-button " title="(Ctrl + K)"><svg><use xlink:href="#trumbowyg-create-link"></use></svg>Insert link</button><button type="button" class="trumbowyg-unlink-dropdown-button "><svg><use xlink:href="#trumbowyg-unlink"></use></svg>Remove link</button></div><div class="trumbowyg-overlay"></div></div>
            </div>
        </div>
        <div class="site_field_col mt-0! mb-7!">
            <label for="slug" class="block text-sm font-bold text-mat">Price</label>
            <div class="mt-4">
                <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input type="number" name="slug" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="1250" value="">
                </div>
            </div>
        </div>
        <div class="site_field_col mt-0! mb-7!">
            <label for="slug" class="block text-sm font-bold text-mat">Features</label>
            <div class="mt-4">
                <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 mb-3">
                    <input type="text" name="slug" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Basic" value="">
                </div>
                <div class="flex items-center rounded-2xl gap-3">
                    <input type="text" name="slug" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block text-sm p-3 w-[96%] flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600" placeholder="Basic" value="">
                    <a href="javascript:void(0)" class="w-[4%] add_sub_btn add_field mt-0! bg-[#EDE9D0] border border-[#c5c1ad] px-4 py-2.5 rounded-2xl flex! items-center justify-center" data-field_type="features" style="">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 7V15M15 11L7 11" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="#222222" stroke-width="1.5"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="site_field_col mt-0! mb-7!">
            <a href="#" class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">Save Plan</a>
        </div>
    </form>
</div>
@endsection
