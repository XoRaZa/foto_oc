/*!
 * FileInput Lithuanian Translations
 *
 * This file must be loaded after 'fileinput.js'. Patterns in braces '{}', or
 * any HTML markup tags in the messages must not be converted or translated.
 *
 * @see http://github.com/kartik-v/bootstrap-fileinput
 *
 * NOTE: this file must be saved in UTF-8 encoding.
 */
(function ($) {
    "use strict";

    $.fn.fileinputLocales['lt'] = {
        fileSingle: 'Failas',
        filePlural: 'Failai',
        browseLabel: 'Naršyti &hellip;',
        removeLabel: 'Ištrinti',
        removeTitle: 'Ištrinti pasirinktus failus',
        cancelLabel: 'Atšaukti',
        cancelTitle: 'Atšaukti įkėlimą',
        uploadLabel: 'Įkelti',
        uploadTitle: 'Įkelti pasirinktus failus',
        msgSizeTooLarge: 'Failas "{name}" (<b>{size} KB</b>) užima daugiau vietos negu leistina: <b>{maxSize} KB</b>. Sumažinkite nuotrauko dydį.',
        msgFilesTooLess: 'You must select at least <b>{n}</b> {files} to upload. Please retry your upload!',
        msgFilesTooMany: 'Number of files selected for upload <b>({n})</b> exceeds maximum allowed limit of <b>{m}</b>. Please retry your upload!',
        msgFileNotFound: 'Failas "{name}" nerastas!',
        msgFileSecured: 'Security restrictions prevent reading the file "{name}".',
        msgFileNotReadable: 'File "{name}" is not readable.',
        msgFilePreviewAborted: 'Failo "{name}" peržiūra atšaukta.',
        msgFilePreviewError: 'Nuskaitant failą "{name}" įvyko klaida.',
        msgInvalidFileType: 'Failas "{name}" yra neleidžiamo tipo. Tik "{types}" tipų failai yra leidžiami.',
        msgInvalidFileExtension: 'Failas "{name}" yra neleidžiamo plėtinio. Tik "{extensions}" plėtinių failai yra leidžiami.',
        msgValidationError: 'Įkeliant failus įvyko klaida.',
        msgLoading: 'Įkeliamas failas {index} iš {files} &hellip;',
        msgProgress: 'Įkeliamas failas {index} iš {files} - {name} - {percent}% baigta.',
        msgSelected: '{n} {files}',
        msgFoldersNotAllowed: 'Galima įtempti tik failus! {n} aplankai nebuvo įkelti.',
        msgImageWidthSmall: 'Width of image file "{name}" must be at least {size} px.',
        msgImageHeightSmall: 'Height of image file "{name}" must be at least {size} px.',
        msgImageWidthLarge: 'Width of image file "{name}" cannot exceed {size} px.',
        msgImageHeightLarge: 'Height of image file "{name}" cannot exceed {size} px.',
        dropZoneTitle: 'Įtempkite nuotraukas čia&hellip;'
    };
})(window.jQuery);