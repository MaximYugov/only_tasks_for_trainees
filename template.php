<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>

<?
$arResult["REQUIRED_SIGN"] = '*';
?>

<div class="contact-form">
    <div class="contact-form__head">
        <div class="contact-form__head-title">Связаться</div>
        <div class="contact-form__head-text">Наши сотрудники помогут выполнить подбор услуги и&nbsp;расчет цены с&nbsp;учетом
            ваших требований
        </div>
    </div>

    <?
    echo str_replace('<form', '<form class="contact-form__form"', $arResult["FORM_HEADER"]);
    ?>
    <div class="contact-form__form-inputs">
		<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion):
	
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'):
		
			echo $arQuestion["HTML_CODE"];
		
        elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'text'):
?>

<div class="input contact-form__input"><label class="input__label" for="<?=$FIELD_SID?>">
        <div class="input__label-text"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></div>
        <?=$arQuestion["HTML_CODE"]?>
                <? if ($arQuestion["CAPTION"] !== 'Номер телефона'): ?>
        <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
                <? endif; ?>
</label></div><?
			endif;
			if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea'):
?></div>
    <div class="contact-form__form-message">
        <div class="input"><label class="input__label" for="medicine_message">
            <div class="input__label-text"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></div>
				<?=$arQuestion["HTML_CODE"]?>
            <div class="input__notification"></div>
        </label></div>
    </div>
	<?
			endif;
	endforeach;
	?>
    <div class="contact-form__bottom">
        <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
        ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
            данных&raquo;.
        </div>
		<input type="hidden" name="web_form_apply" value="Y" />
        <button class="form-button contact-form__bottom-button" data-success="Отправлено"
                data-error="Ошибка отправки">
            <div class="form-button__title"><?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?></div>
        </button>
    </div>
    <?=$arResult["FORM_FOOTER"]?>
</div>