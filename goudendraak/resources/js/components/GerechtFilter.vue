<script setup>
import { ref, computed } from 'vue';

const emit = defineEmits(['add-menu-item']);
const props = defineProps({
  categories: {
    type: Array,
    required: true,
  }
});

const filters = ref({
  name: '',
  id: '',
  category: '',
});

const allDishes = computed(() => {
  return props.categories.flatMap(category =>
    category.dishes.map(dish => ({
      ...dish,
      category: category.name
    }))
  );
});

const uniekeCategorieen = computed(() => {
   return props.categories.map(c => c.name);
});

const gefilterdeGerechten = computed(() => {
  return allDishes.value.filter(gerecht => {
    const naamMatch = gerecht.name.toLowerCase().includes(filters.value.name.toLowerCase());
    const nummerMatch = filters.value.id === '' || gerecht.id.toString().includes(filters.value.id);
    const categorieMatch = filters.value.category === '' || gerecht.category === filters.value.category;
    return naamMatch && nummerMatch && categorieMatch;
  });
});

const getActiveOfferPrice = (gerecht) => {
  if (!gerecht.offers || gerecht.offers.length === 0) return null;
  const now = new Date();
  const active = gerecht.offers.find(offer => {
    return new Date(offer.start_date) <= now && new Date(offer.end_date) >= now;
  });
  return active ? active.new_price : null;
};

const emitAddMenuItem = (id) => {
    emit('add-menu-item', id);
    document.dispatchEvent(new CustomEvent('vue:add-menu-item', { detail: id }));
};
</script>

<template>
  <div class="gerecht-filter">
    <input
      v-model="filters.name"
      type="text"
      placeholder="Filter op naam"
      class="input"
      style="width: 100%;"
    />

    <input
      v-model="filters.id"
      type="text"
      placeholder="Filter op nummer"
      class="input"
      style="width: 100%;"
    />

    <select v-model="filters.category" class="input" style="width: 100%;">
      <option value="">Alle categorieën</option>
      <option
        v-for="categorie in uniekeCategorieen"
        :key="categorie"
        :value="categorie"
      >
        {{ categorie }}
      </option>
    </select>

    <table class="itemToSelectTable">
      <tbody>
        <tr v-for="gerecht in gefilterdeGerechten" :key="gerecht.id">
          <td>
            {{ gerecht.id ?? '' }}.
          </td>
          <td>
            {{ gerecht.name }}
            <span v-if="gerecht.description">
              <i>({{ gerecht.description }})</i>
            </span>
          </td>
          <td>
            <template v-if="getActiveOfferPrice(gerecht) !== null">
              <span style="color:#c00; font-weight:bold;">
                € {{ Number(getActiveOfferPrice(gerecht)).toLocaleString('nl-NL', { minimumFractionDigits: 2 }) }}
              </span>
              <span style="text-decoration:line-through; color:#888; margin-left:6px;">
                € {{ Number(gerecht.price).toLocaleString('nl-NL', { minimumFractionDigits: 2 }) }}
              </span>
            </template>
            <template v-else>
              € {{ Number(gerecht.price).toLocaleString('nl-NL', { minimumFractionDigits: 2 }) }}
            </template>
          </td>
          <td>
            <button @click="emitAddMenuItem(gerecht.id)">Toevoegen</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>