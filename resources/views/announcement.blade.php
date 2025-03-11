@extends('layouts.app')
@section('content')
<div class="mt-5">
    <div class="bgShadow pt-10 pb-8">
       <div class="grid grid-cols-1 mb-6 items-start">
          <div>
             <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Announcements</h1>
          </div>
       </div>
    </div>
    <form id="blogForm" action="" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-0! mb-7! items-end">
            <div class="col-span-2 site_field_col">
                <label for="name" class="block text-sm font-bold text-mat">Title</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3 flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600" placeholder="janesmith" value="">
                </div>
            </div>




            <div class="site_field_col">
                <label for="category_id" class="block text-sm font-bold text-mat">Send To</label>
                <div class="mt-2 grid grid-cols-1">
                    <select id="user_id" name="user_id" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3 flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 text-[#ABABAB]">
                        <option value="" disabled="" selected="">Tradepersons</option>
                                                                <option value="1">
                                Admin
                            </option>
                                                                <option value="2">
                                Customer
                            </option>
                                                                <option value="3">
                                Tradeperson
                            </option>





                                                        </select>
                </div>
            </div>


        </div>
        <div class="site_field_col mt-0! mb-7!">
            <label for="description" class="block text-sm font-bold text-mat">Description</label>
            <div class="mt-4 bg-white rounded-2xl">
                <div class="trumbowyg-box trumbowyg-editor-visible trumbowyg-en trumbowyg"><div class="trumbowyg-button-pane"><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-viewHTML-button trumbowyg-not-disable" title="View HTML" tabindex="-1"><svg><use xlink:href="#trumbowyg-view-html"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-undo-button " title="Undo (Ctrl + Z)" tabindex="-1"><svg><use xlink:href="#trumbowyg-undo"></use></svg></button><button type="button" class="trumbowyg-redo-button " title="Redo (Ctrl + Y)" tabindex="-1"><svg><use xlink:href="#trumbowyg-redo"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-formatting-button trumbowyg-open-dropdown" title="Formatting" tabindex="-1"><svg><use xlink:href="#trumbowyg-p"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-strong-button " title="Strong (Ctrl + B)" tabindex="-1"><svg><use xlink:href="#trumbowyg-strong"></use></svg></button><button type="button" class="trumbowyg-em-button " title="Emphasis (Ctrl + I)" tabindex="-1"><svg><use xlink:href="#trumbowyg-em"></use></svg></button><button type="button" class="trumbowyg-del-button " title="Deleted" tabindex="-1"><svg><use xlink:href="#trumbowyg-del"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-superscript-button " title="Superscript" tabindex="-1"><svg><use xlink:href="#trumbowyg-superscript"></use></svg></button><button type="button" class="trumbowyg-subscript-button " title="Subscript" tabindex="-1"><svg><use xlink:href="#trumbowyg-subscript"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-link-button trumbowyg-open-dropdown" title="Link" tabindex="-1"><svg><use xlink:href="#trumbowyg-link"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-insertImage-button " title="Insert Image" tabindex="-1"><svg><use xlink:href="#trumbowyg-insert-image"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-justifyLeft-button " title="Align Left" tabindex="-1"><svg><use xlink:href="#trumbowyg-justify-left"></use></svg></button><button type="button" class="trumbowyg-justifyCenter-button " title="Align Center" tabindex="-1"><svg><use xlink:href="#trumbowyg-justify-center"></use></svg></button><button type="button" class="trumbowyg-justifyRight-button " title="Align Right" tabindex="-1"><svg><use xlink:href="#trumbowyg-justify-right"></use></svg></button><button type="button" class="trumbowyg-justifyFull-button " title="Align Justify" tabindex="-1"><svg><use xlink:href="#trumbowyg-justify-full"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-unorderedList-button " title="Unordered list" tabindex="-1"><svg><use xlink:href="#trumbowyg-unordered-list"></use></svg></button><button type="button" class="trumbowyg-orderedList-button " title="Ordered list" tabindex="-1"><svg><use xlink:href="#trumbowyg-ordered-list"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-horizontalRule-button " title="Insert horizontal rule" tabindex="-1"><svg><use xlink:href="#trumbowyg-horizontal-rule"></use></svg></button></div><div class="trumbowyg-button-group "><button type="button" class="trumbowyg-removeformat-button " title="Remove format" tabindex="-1"><svg><use xlink:href="#trumbowyg-removeformat"></use></svg></button></div><div class="trumbowyg-button-group trumbowyg-right"><button type="button" class="trumbowyg-fullscreen-button trumbowyg-not-disable" title="Fullscreen" tabindex="-1"><svg><use xlink:href="#trumbowyg-fullscreen"></use></svg></button></div></div><div class="trumbowyg-editor-box"><div class="trumbowyg-editor" contenteditable="true" dir="ltr">
                </div></div><textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 trumbowyg-textarea" tabindex="-1" style="height: 297px;">
                </textarea><div class="trumbowyg-dropdown-formatting trumbowyg-dropdown trumbowyg-fixed-top " data-trumbowyg-dropdown="formatting" style="display: none;"><button type="button" class="trumbowyg-p-dropdown-button "><svg><use xlink:href="#trumbowyg-p"></use></svg>Paragraph</button><button type="button" class="trumbowyg-blockquote-dropdown-button "><svg><use xlink:href="#trumbowyg-blockquote"></use></svg>Quote</button><button type="button" class="trumbowyg-h1-dropdown-button "><svg><use xlink:href="#trumbowyg-h1"></use></svg>Header 1</button><button type="button" class="trumbowyg-h2-dropdown-button "><svg><use xlink:href="#trumbowyg-h2"></use></svg>Header 2</button><button type="button" class="trumbowyg-h3-dropdown-button "><svg><use xlink:href="#trumbowyg-h3"></use></svg>Header 3</button><button type="button" class="trumbowyg-h4-dropdown-button "><svg><use xlink:href="#trumbowyg-h4"></use></svg>Header 4</button></div><div class="trumbowyg-dropdown-link trumbowyg-dropdown trumbowyg-fixed-top " data-trumbowyg-dropdown="link" style="display: none;"><button type="button" class="trumbowyg-createLink-dropdown-button " title="(Ctrl + K)"><svg><use xlink:href="#trumbowyg-create-link"></use></svg>Insert link</button><button type="button" class="trumbowyg-unlink-dropdown-button "><svg><use xlink:href="#trumbowyg-unlink"></use></svg>Remove link</button></div><div class="trumbowyg-overlay"></div></div>
            </div>
        </div>
        <div class="site_field_col mt-0! mb-7!">
            <a href="#" class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">Send</a>
        </div>
    </form>
</div>
@endsection
