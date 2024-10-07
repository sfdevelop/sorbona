<?php

// Home
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Начальная', route('login'));
});

/*
 * singleton
 */

Breadcrumbs::for('setting', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.option'), route('admin.setting.edit'));
});

Breadcrumbs::for('mainScreen', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.main_screen'), route('admin.mainScreen.edit'));
});

Breadcrumbs::for('whoWe', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.whyWe'), route('admin.whoWe.edit'));
});

Breadcrumbs::for('optionChange', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.option'), route('admin.optionChange.edit'));
});

Breadcrumbs::for('optionScroll', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.option'), route('admin.optionScroll.edit'));
});

Breadcrumbs::for('payment', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.payment'), route('admin.payment.edit'));
});

Breadcrumbs::for('optionComment', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.option'), route('admin.optionComment.edit'));
});

Breadcrumbs::for('optionFaq', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.option'), route('admin.optionFaq.edit'));
});

Breadcrumbs::for('settings', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.option'), route('admin.settings.edit'));
});

/*
 * from admin
 */

Breadcrumbs::for('comment', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.comments'), route('admin.comment.index'));
});

Breadcrumbs::for('commentEdit', function ($trail) {
    $trail->parent('comment');
    $trail->push(__('admin.comments').' '.__('admin.create'), route('admin.comment.create'));
});

Breadcrumbs::for('commentUpdate', function ($trail, $comment) {
    $trail->parent('comment');
    $trail->push($comment->name, route('admin.comment.update', $comment->id));
});

Breadcrumbs::for('faq', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.faq'), route('admin.faq.index'));
});

Breadcrumbs::for('faqEdit', function ($trail) {
    $trail->parent('faq');
    $trail->push(__('admin.faq').' '.__('admin.create'), route('admin.faq.create'));
});

Breadcrumbs::for('faqUpdate', function ($trail, $faq) {
    $trail->parent('faq');
    $trail->push($faq->title, route('admin.faq.update', $faq->id));
});

Breadcrumbs::for('article', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.articles'), route('admin.article.index'));
});

Breadcrumbs::for('articleEdit', function ($trail) {
    $trail->parent('article');
    $trail->push(__('admin.articles').' '.__('admin.create'), route('admin.article.create'));
});

Breadcrumbs::for('articleUpdate', function ($trail, $article) {
    $trail->parent('article');
    $trail->push($article->title, route('admin.article.update', $article->id));
});

Breadcrumbs::for('scroll', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.scroll'), route('admin.scroll.index'));
});

Breadcrumbs::for('scrollEdit', function ($trail) {
    $trail->parent('scroll');
    $trail->push(__('admin.scroll').' '.__('admin.create'), route('admin.scroll.create'));
});

Breadcrumbs::for('scrollUpdate', function ($trail, $scroll) {
    $trail->parent('scroll');
    $trail->push($scroll->title, route('admin.scroll.update', $scroll->id));
});

Breadcrumbs::for('menuList', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.menuList'), route('admin.menuList.index'));
});

Breadcrumbs::for('menuListEdit', function ($trail) {
    $trail->parent('menuList');
    $trail->push(__('admin.menuList').' '.__('admin.create'), route('admin.menuList.create'));
});

Breadcrumbs::for('menuListUpdate', function ($trail, $menuList) {
    $trail->parent('menuList');
    $trail->push($menuList->title, route('admin.menuList.update', $menuList->id));
});

Breadcrumbs::for('menu', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.product'), route('admin.menu.index'));
});

Breadcrumbs::for('menuEdit', function ($trail) {
    $trail->parent('menu');
    $trail->push(__('admin.product').' '.__('admin.create'), route('admin.menu.create'));
});

Breadcrumbs::for('menuUpdate', function ($trail, $menu) {
    $trail->parent('menu');
    $trail->push($menu->title, route('admin.menu.update', $menu->id));
});

Breadcrumbs::for('change', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.change'), route('admin.change.index'));
});

Breadcrumbs::for('changeEdit', function ($trail) {
    $trail->parent('change');
    $trail->push(__('admin.change').' '.__('admin.create'), route('admin.change.create'));
});

Breadcrumbs::for('changeUpdate', function ($trail, $change) {
    $trail->parent('change');
    $trail->push($change->title, route('admin.change.update', $change->id));
});
