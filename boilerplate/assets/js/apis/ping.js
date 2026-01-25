import { getContext, store, withSyncEvent } from "@wordpress/interactivity";

store("storeName", {
  action: {
    checkAPI: withSyncEvent((event) => {
      event.preventDefault();

      // Define the context
      const context = getContext();

      // Get context variables
      const { one, two, loading } = context;

      context.loading = true;

      // Api handle
      window.wp
        .apiFetch({
          path: "example/v1/ping",
          method: "POST",
          credentials: "same-origin",
          headers: {
            "X-RS-KEY": "give key",
            "Content-Type": "application/json",
          },
          data: {
            one: one,
            two: two,
          },
        })
        .then((res) => {
          context.loading = false;
          console.log(res);
        })
        .catch((error) => {
          alert("something is wrong");
          context.loading = false;
          console.error("Error:", error);
        });
    }),

    // This one for form submit

    // tiggerName: withSyncEvent((event) => {
    //   event.preventDefault();

    //   // Define the context
    //   const context = getContext();

    //   // Get context variables
    //   const { one, two, loading } = context;

    //   context.loading = true;

    //   // Api handle
    //   window.wp
    //     .apiFetch({
    //       path: "example/v1/ping",
    //       method: "POST",
    //       credentials: "same-origin",
    //       headers: {
    //         "X-RS-KEY": "give key",
    //         "Content-Type": "application/json",
    //       },
    //       data: {
    //         one: one,
    //         two: two,
    //       },
    //     })
    //     .then((res) => {
    //       context.loading = false;
    //       console.log(res);
    //     })
    //     .catch((error) => {
    //       alert("something is wrong");
    //       context.loading = false;
    //       console.error("Error:", error);
    //     });
    // }),
  },
});
