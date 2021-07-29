import { Controller } from 'stimulus';
export default class extends Controller {
    static values = {
        url: String,
    }
    static targets = ['content'];

    async refreshContent(event) {
        this.contentTarget.style.opacity = .5;
        const response = await fetch(this.urlValue);
        this.contentTarget.innerHTML = await response.text();
        this.contentTarget.style.opacity = 1;
    }
}