<template>
    <div class="inline-flex">
        <tooltip trigger="click">
            <div class="text-primary inline-flex items-center dim cursor-pointer">
                <span class="text-primary font-bold">{{ __("View") }}</span>
            </div>
            <tooltip-content slot="content">
                <ul class="list-reset language-switcher-field">
                    <li v-bind:key="option.locale" v-for="option in options" class="mb-1 form-actions">
                        <router-link
                            :data-testid="`${testId}-view-button`"
                            :dusk="`${field.value.id}-view-button`"
                            class="
                                cursor-pointer
                                text-70
                                hover:text-primary
                                ml-3
                                mt-2
                                inline-flex
                                items-center
                            "
                            v-tooltip.click="__('View :lang', { lang: option.label})"
                            :to="{
                                name: 'detail',
                                params: {
                                    resourceName: resourceName,
                                    resourceId: field.value.id
                                },
                                query: {
                                    [field.param]: option.locale
                                }
                            }"
                        >
                            <div class="options-lang flex">
                                <country-flag :country="getFlag(option.locale)" size="normal" />
                                <span class="text">{{ option.label }}</span>
                            </div>
                        </router-link>
                    </li>
                </ul>
            </tooltip-content>
        </tooltip>
        &nbsp;|&nbsp;
        <tooltip trigger="click">
            <div class="text-primary inline-flex items-center dim cursor-pointer">
                <span class="text-primary font-bold">{{ __("Edit") }}</span>
            </div>
            <tooltip-content slot="content">
                <ul class="list-reset language-switcher-field">
                    <li v-bind:key="option.locale" v-for="option in options" class="mb-1 form-actions">
                        <router-link
                            :data-testid="`${testId}-edit-button`"
                            :dusk="`${field.value.id}-edit-button`"
                            class="
                                cursor-pointer
                                text-70
                                hover:text-primary
                                ml-3
                                mt-2
                                inline-flex
                                items-center
                            "
                            v-tooltip.click="__('Edit :lang', { lang: option.label})"
                            :to="{
                                name: 'edit',
                                params: {
                                    resourceName: resourceName,
                                    resourceId: field.value.id
                                },
                                query: {
                                    [field.param]: option.locale
                                }
                            }"
                        >
                            <div class="options-lang flex">
                                <country-flag :country="getFlag(option.locale)" size="normal" />
                                <span class="text">{{ option.label }}</span>
                            </div>
                        </router-link>
                    </li>
                </ul>
            </tooltip-content>
        </tooltip>
    </div>
</template>

<script>
    import { global } from '../mixin/global'
    export default {
        mixins: [ global ],
        props: ["resourceName", "field"],

        data: () => ({
            locales: window.config.languageSwitcher.locales || {},
            options: []
        }),

        created() {
            for (const [locale, label] of Object.entries(this.locales)) {
                this.options.push({ label: label, locale: locale });
            }

        },

        computed: {
            console: () => console,
        },
    };
</script>
