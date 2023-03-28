set(CMAKE_CXX_COMPILER "/nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/g++")
set(CMAKE_CXX_COMPILER_ARG1 "")
set(CMAKE_CXX_COMPILER_ID "GNU")
set(CMAKE_CXX_COMPILER_VERSION "11.3.0")
set(CMAKE_CXX_COMPILER_VERSION_INTERNAL "")
set(CMAKE_CXX_COMPILER_WRAPPER "")
set(CMAKE_CXX_STANDARD_COMPUTED_DEFAULT "17")
set(CMAKE_CXX_EXTENSIONS_COMPUTED_DEFAULT "ON")
set(CMAKE_CXX_COMPILE_FEATURES "cxx_std_98;cxx_template_template_parameters;cxx_std_11;cxx_alias_templates;cxx_alignas;cxx_alignof;cxx_attributes;cxx_auto_type;cxx_constexpr;cxx_decltype;cxx_decltype_incomplete_return_types;cxx_default_function_template_args;cxx_defaulted_functions;cxx_defaulted_move_initializers;cxx_delegating_constructors;cxx_deleted_functions;cxx_enum_forward_declarations;cxx_explicit_conversions;cxx_extended_friend_declarations;cxx_extern_templates;cxx_final;cxx_func_identifier;cxx_generalized_initializers;cxx_inheriting_constructors;cxx_inline_namespaces;cxx_lambdas;cxx_local_type_template_args;cxx_long_long_type;cxx_noexcept;cxx_nonstatic_member_init;cxx_nullptr;cxx_override;cxx_range_for;cxx_raw_string_literals;cxx_reference_qualified_functions;cxx_right_angle_brackets;cxx_rvalue_references;cxx_sizeof_member;cxx_static_assert;cxx_strong_enums;cxx_thread_local;cxx_trailing_return_types;cxx_unicode_literals;cxx_uniform_initialization;cxx_unrestricted_unions;cxx_user_literals;cxx_variadic_macros;cxx_variadic_templates;cxx_std_14;cxx_aggregate_default_initializers;cxx_attribute_deprecated;cxx_binary_literals;cxx_contextual_conversions;cxx_decltype_auto;cxx_digit_separators;cxx_generic_lambdas;cxx_lambda_init_captures;cxx_relaxed_constexpr;cxx_return_type_deduction;cxx_variable_templates;cxx_std_17;cxx_std_20;cxx_std_23")
set(CMAKE_CXX98_COMPILE_FEATURES "cxx_std_98;cxx_template_template_parameters")
set(CMAKE_CXX11_COMPILE_FEATURES "cxx_std_11;cxx_alias_templates;cxx_alignas;cxx_alignof;cxx_attributes;cxx_auto_type;cxx_constexpr;cxx_decltype;cxx_decltype_incomplete_return_types;cxx_default_function_template_args;cxx_defaulted_functions;cxx_defaulted_move_initializers;cxx_delegating_constructors;cxx_deleted_functions;cxx_enum_forward_declarations;cxx_explicit_conversions;cxx_extended_friend_declarations;cxx_extern_templates;cxx_final;cxx_func_identifier;cxx_generalized_initializers;cxx_inheriting_constructors;cxx_inline_namespaces;cxx_lambdas;cxx_local_type_template_args;cxx_long_long_type;cxx_noexcept;cxx_nonstatic_member_init;cxx_nullptr;cxx_override;cxx_range_for;cxx_raw_string_literals;cxx_reference_qualified_functions;cxx_right_angle_brackets;cxx_rvalue_references;cxx_sizeof_member;cxx_static_assert;cxx_strong_enums;cxx_thread_local;cxx_trailing_return_types;cxx_unicode_literals;cxx_uniform_initialization;cxx_unrestricted_unions;cxx_user_literals;cxx_variadic_macros;cxx_variadic_templates")
set(CMAKE_CXX14_COMPILE_FEATURES "cxx_std_14;cxx_aggregate_default_initializers;cxx_attribute_deprecated;cxx_binary_literals;cxx_contextual_conversions;cxx_decltype_auto;cxx_digit_separators;cxx_generic_lambdas;cxx_lambda_init_captures;cxx_relaxed_constexpr;cxx_return_type_deduction;cxx_variable_templates")
set(CMAKE_CXX17_COMPILE_FEATURES "cxx_std_17")
set(CMAKE_CXX20_COMPILE_FEATURES "cxx_std_20")
set(CMAKE_CXX23_COMPILE_FEATURES "cxx_std_23")

set(CMAKE_CXX_PLATFORM_ID "Linux")
set(CMAKE_CXX_SIMULATE_ID "")
set(CMAKE_CXX_COMPILER_FRONTEND_VARIANT "")
set(CMAKE_CXX_SIMULATE_VERSION "")




set(CMAKE_AR "/nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/ar")
set(CMAKE_CXX_COMPILER_AR "/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/bin/gcc-ar")
set(CMAKE_RANLIB "/nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/ranlib")
set(CMAKE_CXX_COMPILER_RANLIB "/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/bin/gcc-ranlib")
set(CMAKE_LINKER "/nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/ld")
set(CMAKE_MT "")
set(CMAKE_COMPILER_IS_GNUCXX 1)
set(CMAKE_CXX_COMPILER_LOADED 1)
set(CMAKE_CXX_COMPILER_WORKS TRUE)
set(CMAKE_CXX_ABI_COMPILED TRUE)

set(CMAKE_CXX_COMPILER_ENV_VAR "CXX")

set(CMAKE_CXX_COMPILER_ID_RUN 1)
set(CMAKE_CXX_SOURCE_FILE_EXTENSIONS C;M;c++;cc;cpp;cxx;m;mm;mpp;CPP;ixx;cppm)
set(CMAKE_CXX_IGNORE_EXTENSIONS inl;h;hpp;HPP;H;o;O;obj;OBJ;def;DEF;rc;RC)

foreach (lang C OBJC OBJCXX)
  if (CMAKE_${lang}_COMPILER_ID_RUN)
    foreach(extension IN LISTS CMAKE_${lang}_SOURCE_FILE_EXTENSIONS)
      list(REMOVE_ITEM CMAKE_CXX_SOURCE_FILE_EXTENSIONS ${extension})
    endforeach()
  endif()
endforeach()

set(CMAKE_CXX_LINKER_PREFERENCE 30)
set(CMAKE_CXX_LINKER_PREFERENCE_PROPAGATES 1)

# Save compiler ABI information.
set(CMAKE_CXX_SIZEOF_DATA_PTR "8")
set(CMAKE_CXX_COMPILER_ABI "ELF")
set(CMAKE_CXX_BYTE_ORDER "LITTLE_ENDIAN")
set(CMAKE_CXX_LIBRARY_ARCHITECTURE "")

if(CMAKE_CXX_SIZEOF_DATA_PTR)
  set(CMAKE_SIZEOF_VOID_P "${CMAKE_CXX_SIZEOF_DATA_PTR}")
endif()

if(CMAKE_CXX_COMPILER_ABI)
  set(CMAKE_INTERNAL_PLATFORM_ABI "${CMAKE_CXX_COMPILER_ABI}")
endif()

if(CMAKE_CXX_LIBRARY_ARCHITECTURE)
  set(CMAKE_LIBRARY_ARCHITECTURE "")
endif()

set(CMAKE_CXX_CL_SHOWINCLUDES_PREFIX "")
if(CMAKE_CXX_CL_SHOWINCLUDES_PREFIX)
  set(CMAKE_CL_SHOWINCLUDES_PREFIX "${CMAKE_CXX_CL_SHOWINCLUDES_PREFIX}")
endif()





set(CMAKE_CXX_IMPLICIT_INCLUDE_DIRECTORIES "/run/current-system/sw/include;/nix/store/ds404rz00qp02rxj7ylwmnkb5dm7bibp-libxml++-2.40.1/include;/nix/store/2ljws12xpfaz1c0nmnm5gqxdyl5298qr-libxml2-2.10.3-dev/include;/nix/store/6346fpq667413xy2fhk29lc16wzsnxk9-zlib-1.2.13-dev/include;/nix/store/zx5lhvlvl55720j49lhcpzilg9bl3x2m-glibmm-2.66.5-dev/include;/nix/store/0j5vxgshff9ixi8b9vpgyb69nfs9bdyv-glib-2.74.3-dev/include;/nix/store/sb1q5hpv4rsvh4ff2sfchsa30gz7f195-libffi-3.4.4-dev/include;/nix/store/pqigj065gs5kyclpifxpmp0mwk77r0dd-gettext-0.21/include;/nix/store/7vj4gncc10h7q2s5bdcm77hcg7axscir-glibc-iconv-2.35/include;/nix/store/66zzrrcpyw6x7bx9q395d953h9040dhg-libsigc++-2.10.8/include;/nix/store/3xn7v0n2dpwniij6bm92yf61q7bjgdgi-libyaml-cpp-0.7.0/include;/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/include/c++/11.3.0;/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/include/c++/11.3.0/x86_64-unknown-linux-gnu;/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/include/c++/11.3.0/backward;/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/lib/gcc/x86_64-unknown-linux-gnu/11.3.0/include;/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/include;/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/lib/gcc/x86_64-unknown-linux-gnu/11.3.0/include-fixed;/nix/store/bq928ff6m7lvcfyvcdvgvqxhqi5f3ijq-glibc-2.35-224-dev/include")
set(CMAKE_CXX_IMPLICIT_LINK_LIBRARIES "stdc++;m;gcc_s;gcc;c;gcc_s;gcc")
set(CMAKE_CXX_IMPLICIT_LINK_DIRECTORIES "/run/current-system/sw/lib;/nix/store/ds404rz00qp02rxj7ylwmnkb5dm7bibp-libxml++-2.40.1/lib;/nix/store/fblaj5ywkgphzpp5kx41av32kls9256y-zlib-1.2.13/lib;/nix/store/yslcn8vg16ww8015hm8rw0c6aj8m18rx-libxml2-2.10.3/lib;/nix/store/w3vhn119jd81k3220kf8ap1vbilk92f2-libffi-3.4.4/lib;/nix/store/pqigj065gs5kyclpifxpmp0mwk77r0dd-gettext-0.21/lib;/nix/store/24pc1c07rqc5fk7v0skrwjgicilagm52-glib-2.74.3/lib;/nix/store/66zzrrcpyw6x7bx9q395d953h9040dhg-libsigc++-2.10.8/lib;/nix/store/4i28kh28gzvzm1fqxji1qzkldq0nql6j-glibmm-2.66.5/lib;/nix/store/3xn7v0n2dpwniij6bm92yf61q7bjgdgi-libyaml-cpp-0.7.0/lib;/nix/store/9xfad3b5z4y00mzmk2wnn4900q0qmxns-glibc-2.35-224/lib;/nix/store/b13h86pg7lbf6vpc1vwzw6akmakyw1bs-gcc-11.3.0-lib/lib;/nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin;/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/lib/gcc/x86_64-unknown-linux-gnu/11.3.0;/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/lib64;/nix/store/3cjvw93ly6cx2af13f2l3pw4yzbi8wp6-gcc-11.3.0/lib")
set(CMAKE_CXX_IMPLICIT_LINK_FRAMEWORK_DIRECTORIES "")
