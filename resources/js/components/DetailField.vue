<template>
    <panel-item :field="field">
        <div slot="value">
            <div class="flex language-switcher-field">
                <div v-if="active && active.locale && active.label" class="flex w-full leading-tight form-active">
                    <div class="active-lang flex">
                        <country-flag :country="getFlag(active.locale)" size="normal" />
                        <span class="text">{{ active.label }}</span>
                    </div>
                </div>
                <div v-if="Object.keys(options).length > 0" class="form-actions flex">
                    <v-select :id="field.name"
                            :class="errorClasses" 
                            :placeholder="getPlaceholder"
                            :options="options" 
                            :value="null"
                            v-on:option:selected="changeLocale"
                            label="label"
                            clearable="false"
                            >
                        <template v-slot:option="option">
                            <div class="options-lang flex">
                                <country-flag :country="getFlag(option.locale)" size="normal" />
                                <span class="text">{{ option.label }}</span>
                            </div>
                        </template>
                    </v-select>
         
                    <div v-if="field.authorizedToEdit">
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
                            v-tooltip.click="__('Edit')"
                            :to="{
                                name: 'edit',
                                params: {
                                    resourceName: resourceName,
                                    resourceId: field.value.id
                                },
                                query: {
                                    [field.param]: current
                                }
                            }"
                        >
                            <icon type="edit" />
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </panel-item>
</template>

<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova'
    import { global } from '../mixin/global'

    export default {
        mixins: [ FormField, HandlesValidationErrors, global ],

        props: ['resourceName', 'resourceId', 'field'],

        data: function () {
            return {
                current: window.config.locale,
                fallback: window.config.fallback_locale,
                locales: window.config.locales || {},
                active: {},
                options: [],
                isEditing: false,
            }
        },
        mounted() {

            if (!this.field.value.active) {
                this.field.value.active = this.fallback;
            }
            
            for (const [locale, label] of Object.entries(this.locales)) {
                if (this.field.value.active === locale) {
                    this.active = {
                        label: label,
                        locale: locale
                    }
                }

                else {
                    this.options.push({ label: label, locale: locale });
                }
            }

            window.config.ls_params = this.field.params || 'lang';

            this.isEditing = false;
        },

        computed: {
            console: () => console,
            getPlaceholder: function(el) {
                return el.field.placeholder;
            }
        },
    }
</script>
