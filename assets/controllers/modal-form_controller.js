import {Controller} from 'stimulus';
import {Modal} from 'bootstrap';
import $ from 'jquery';
import {useDispatch} from 'stimulus-use'

export default class extends Controller {
    static targets = ['modal', 'modalBody'];
    static values = {
        formUrl: String,
    }


    connect() {
        useDispatch(this);
    }

    async openModal(event) {
        this.modal = new Modal(this.modalTarget)
        this.modal.show();
        this.modalBodyTarget.innerHTML = await $.ajax({
            url: this.formUrlValue
        });
        $('.js-datepicker').datepicker({
            language: 'fr',
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayBtn: "linked",
            todayHighlight: true,
            orientation: "bottom",
        });
    }


    async submitForm(e) {
        e.preventDefault();
        const $form = $(this.modalBodyTarget).find('form');
        try {
            await $.ajax({
                url: this.formUrlValue,
                method: $form.prop('method'),
                data: $form.serialize(),
            });
            this.modal.hide();
            this.dispatch('success');
        } catch (e) {
            this.modalBodyTarget.innerHTML = e.responseText;
            $('.js-datepicker').datepicker({
                language: 'fr',
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayBtn: "linked",
                todayHighlight: true,
                orientation: "bottom",
            });
        }
    }

    modalHidden() {
    }

}