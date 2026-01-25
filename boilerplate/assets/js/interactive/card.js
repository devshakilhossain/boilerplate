import { getContext, store } from "@wordpress/interactivity";

store("storeName", {
  actions: {
    increment() {
      const context = getContext();
      context.count++;
    },

    decrement() {
      const context = getContext();
      context.count--;
    },
  },
});
