# CMAKE generated file: DO NOT EDIT!
# Generated by "Unix Makefiles" Generator, CMake Version 3.24

# Delete rule output on recipe failure.
.DELETE_ON_ERROR:

#=============================================================================
# Special targets provided by cmake.

# Disable implicit rules so canonical targets will work.
.SUFFIXES:

# Disable VCS-based implicit rules.
% : %,v

# Disable VCS-based implicit rules.
% : RCS/%

# Disable VCS-based implicit rules.
% : RCS/%,v

# Disable VCS-based implicit rules.
% : SCCS/s.%

# Disable VCS-based implicit rules.
% : s.%

.SUFFIXES: .hpux_make_needs_suffix_list

# Command-line flag to silence nested $(MAKE).
$(VERBOSE)MAKESILENT = -s

#Suppress display of executed commands.
$(VERBOSE).SILENT:

# A target that is always out of date.
cmake_force:
.PHONY : cmake_force

#=============================================================================
# Set environment variables for the build.

# The shell in which to execute make rules.
SHELL = /bin/sh

# The CMake executable.
CMAKE_COMMAND = /nix/store/spkzmydsgmf0bm3xm4s8rqmmvvfaa42p-cmake-3.24.3/bin/cmake

# The command to remove a file.
RM = /nix/store/spkzmydsgmf0bm3xm4s8rqmmvvfaa42p-cmake-3.24.3/bin/cmake -E rm -f

# Escaping for special characters.
EQUALS = =

# The top-level source directory on which CMake was run.
CMAKE_SOURCE_DIR = /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork

# The top-level build directory on which CMake was run.
CMAKE_BINARY_DIR = /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build

# Include any dependencies generated for this target.
include tests/CMakeFiles/testsuite.dir/depend.make
# Include any dependencies generated by the compiler for this target.
include tests/CMakeFiles/testsuite.dir/compiler_depend.make

# Include the progress variables for this target.
include tests/CMakeFiles/testsuite.dir/progress.make

# Include the compile flags for this target's objects.
include tests/CMakeFiles/testsuite.dir/flags.make

tests/CMakeFiles/testsuite.dir/basics/node.cc.o: tests/CMakeFiles/testsuite.dir/flags.make
tests/CMakeFiles/testsuite.dir/basics/node.cc.o: /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/tests/basics/node.cc
tests/CMakeFiles/testsuite.dir/basics/node.cc.o: tests/CMakeFiles/testsuite.dir/compiler_depend.ts
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --progress-dir=/home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/CMakeFiles --progress-num=$(CMAKE_PROGRESS_1) "Building CXX object tests/CMakeFiles/testsuite.dir/basics/node.cc.o"
	cd /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests && /nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/g++ $(CXX_DEFINES) $(CXX_INCLUDES) $(CXX_FLAGS) -MD -MT tests/CMakeFiles/testsuite.dir/basics/node.cc.o -MF CMakeFiles/testsuite.dir/basics/node.cc.o.d -o CMakeFiles/testsuite.dir/basics/node.cc.o -c /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/tests/basics/node.cc

tests/CMakeFiles/testsuite.dir/basics/node.cc.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing CXX source to CMakeFiles/testsuite.dir/basics/node.cc.i"
	cd /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests && /nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/g++ $(CXX_DEFINES) $(CXX_INCLUDES) $(CXX_FLAGS) -E /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/tests/basics/node.cc > CMakeFiles/testsuite.dir/basics/node.cc.i

tests/CMakeFiles/testsuite.dir/basics/node.cc.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling CXX source to assembly CMakeFiles/testsuite.dir/basics/node.cc.s"
	cd /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests && /nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/g++ $(CXX_DEFINES) $(CXX_INCLUDES) $(CXX_FLAGS) -S /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/tests/basics/node.cc -o CMakeFiles/testsuite.dir/basics/node.cc.s

tests/CMakeFiles/testsuite.dir/basics/store.cc.o: tests/CMakeFiles/testsuite.dir/flags.make
tests/CMakeFiles/testsuite.dir/basics/store.cc.o: /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/tests/basics/store.cc
tests/CMakeFiles/testsuite.dir/basics/store.cc.o: tests/CMakeFiles/testsuite.dir/compiler_depend.ts
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --progress-dir=/home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/CMakeFiles --progress-num=$(CMAKE_PROGRESS_2) "Building CXX object tests/CMakeFiles/testsuite.dir/basics/store.cc.o"
	cd /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests && /nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/g++ $(CXX_DEFINES) $(CXX_INCLUDES) $(CXX_FLAGS) -MD -MT tests/CMakeFiles/testsuite.dir/basics/store.cc.o -MF CMakeFiles/testsuite.dir/basics/store.cc.o.d -o CMakeFiles/testsuite.dir/basics/store.cc.o -c /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/tests/basics/store.cc

tests/CMakeFiles/testsuite.dir/basics/store.cc.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing CXX source to CMakeFiles/testsuite.dir/basics/store.cc.i"
	cd /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests && /nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/g++ $(CXX_DEFINES) $(CXX_INCLUDES) $(CXX_FLAGS) -E /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/tests/basics/store.cc > CMakeFiles/testsuite.dir/basics/store.cc.i

tests/CMakeFiles/testsuite.dir/basics/store.cc.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling CXX source to assembly CMakeFiles/testsuite.dir/basics/store.cc.s"
	cd /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests && /nix/store/9yxrwp848f7msm6m2442yfpji8m3206b-gcc-wrapper-11.3.0/bin/g++ $(CXX_DEFINES) $(CXX_INCLUDES) $(CXX_FLAGS) -S /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/tests/basics/store.cc -o CMakeFiles/testsuite.dir/basics/store.cc.s

# Object files for target testsuite
testsuite_OBJECTS = \
"CMakeFiles/testsuite.dir/basics/node.cc.o" \
"CMakeFiles/testsuite.dir/basics/store.cc.o"

# External object files for target testsuite
testsuite_EXTERNAL_OBJECTS =

tests/testsuite: tests/CMakeFiles/testsuite.dir/basics/node.cc.o
tests/testsuite: tests/CMakeFiles/testsuite.dir/basics/store.cc.o
tests/testsuite: tests/CMakeFiles/testsuite.dir/build.make
tests/testsuite: /nix/store/367k5cfrkh8fvnj06v0v24c1yf04ai1q-gtest-1.12.1/lib/libgtest_main.so.1.12.1
tests/testsuite: libzork.so
tests/testsuite: /nix/store/3xn7v0n2dpwniij6bm92yf61q7bjgdgi-libyaml-cpp-0.7.0/lib/libyaml-cpp.so
tests/testsuite: /nix/store/367k5cfrkh8fvnj06v0v24c1yf04ai1q-gtest-1.12.1/lib/libgtest.so.1.12.1
tests/testsuite: /nix/store/ds404rz00qp02rxj7ylwmnkb5dm7bibp-libxml++-2.40.1/lib/libxml++-2.6.so
tests/testsuite: /nix/store/yslcn8vg16ww8015hm8rw0c6aj8m18rx-libxml2-2.10.3/lib/libxml2.so
tests/testsuite: /nix/store/4i28kh28gzvzm1fqxji1qzkldq0nql6j-glibmm-2.66.5/lib/libglibmm-2.4.so
tests/testsuite: /nix/store/24pc1c07rqc5fk7v0skrwjgicilagm52-glib-2.74.3/lib/libgobject-2.0.so
tests/testsuite: /nix/store/24pc1c07rqc5fk7v0skrwjgicilagm52-glib-2.74.3/lib/libglib-2.0.so
tests/testsuite: /nix/store/66zzrrcpyw6x7bx9q395d953h9040dhg-libsigc++-2.10.8/lib/libsigc-2.0.so
tests/testsuite: tests/CMakeFiles/testsuite.dir/link.txt
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --bold --progress-dir=/home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/CMakeFiles --progress-num=$(CMAKE_PROGRESS_3) "Linking CXX executable testsuite"
	cd /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests && $(CMAKE_COMMAND) -E cmake_link_script CMakeFiles/testsuite.dir/link.txt --verbose=$(VERBOSE)

# Rule to build all files generated by this target.
tests/CMakeFiles/testsuite.dir/build: tests/testsuite
.PHONY : tests/CMakeFiles/testsuite.dir/build

tests/CMakeFiles/testsuite.dir/clean:
	cd /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests && $(CMAKE_COMMAND) -P CMakeFiles/testsuite.dir/cmake_clean.cmake
.PHONY : tests/CMakeFiles/testsuite.dir/clean

tests/CMakeFiles/testsuite.dir/depend:
	cd /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build && $(CMAKE_COMMAND) -E cmake_depends "Unix Makefiles" /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/tests /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests /home/ossama.chidmi/afs/epita-ing-assistants-yaka-libzork-2025-ossama.chidmi/libzork/build/tests/CMakeFiles/testsuite.dir/DependInfo.cmake --color=$(COLOR)
.PHONY : tests/CMakeFiles/testsuite.dir/depend
